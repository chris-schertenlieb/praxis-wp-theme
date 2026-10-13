<?php
/**
 * Heading anchors for the Table of contents block.
 *
 * Every Heading block in a post's content gets an id, so a table of contents
 * (or anyone sharing a link) can point at it. Headings that already have an
 * HTML anchor keep it. Generated ids come from the heading text and are made
 * unique within the post, the same way for the table of contents and for
 * the headings themselves.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the Heading blocks in a post's content, in document order.
 *
 * @param int $post_id Post ID.
 * @return array[] List of headings, each with 'level' (int), 'text' (string)
 *                 and 'id' (string).
 */
function praxis_get_post_headings( $post_id ) {
	static $cache = array();

	$post_id = (int) $post_id;
	if ( isset( $cache[ $post_id ] ) ) {
		return $cache[ $post_id ];
	}

	$content = get_post_field( 'post_content', $post_id, 'raw' );
	if ( ! is_string( $content ) || ! has_block( 'core/heading', $content ) ) {
		$cache[ $post_id ] = array();
		return $cache[ $post_id ];
	}

	$headings = array();
	praxis_collect_headings( parse_blocks( $content ), $headings );

	// Reserve the ids authors set themselves, then fill in the rest.
	$used = array();
	foreach ( $headings as $heading ) {
		if ( '' !== $heading['id'] ) {
			$used[ $heading['id'] ] = true;
		}
	}

	foreach ( $headings as $index => $heading ) {
		if ( '' === $heading['id'] ) {
			$headings[ $index ]['id']        = praxis_unique_heading_id( $heading['text'], $used );
			$headings[ $index ]['generated'] = true;
		}
	}

	$cache[ $post_id ] = $headings;
	return $headings;
}

/**
 * Walks parsed blocks and collects the Heading blocks.
 *
 * @param array $blocks   Parsed blocks.
 * @param array $headings Headings found so far, added to in place.
 */
function praxis_collect_headings( $blocks, &$headings ) {
	foreach ( $blocks as $block ) {
		if ( 'core/heading' === $block['blockName'] ) {
			$text = praxis_heading_text( $block['innerHTML'] );

			if ( '' !== $text ) {
				$headings[] = array(
					'level'     => isset( $block['attrs']['level'] ) ? (int) $block['attrs']['level'] : 2,
					'text'      => $text,
					'id'        => praxis_heading_id( $block['innerHTML'] ),
					'generated' => false,
				);
			}
		}

		if ( ! empty( $block['innerBlocks'] ) ) {
			praxis_collect_headings( $block['innerBlocks'], $headings );
		}
	}
}

/**
 * Returns a heading's plain text, with whitespace collapsed.
 *
 * @param string $html Heading markup.
 * @return string
 */
function praxis_heading_text( $html ) {
	return trim( preg_replace( '/\s+/u', ' ', html_entity_decode( wp_strip_all_tags( $html ), ENT_QUOTES, 'UTF-8' ) ) );
}

/**
 * Returns the id attribute of the first h1–h6 in some markup.
 *
 * @param string $html Heading markup.
 * @return string The id, or an empty string.
 */
function praxis_heading_id( $html ) {
	$tags = new WP_HTML_Tag_Processor( $html );

	while ( $tags->next_tag() ) {
		if ( preg_match( '/^H[1-6]$/', $tags->get_tag() ) ) {
			$id = $tags->get_attribute( 'id' );
			return is_string( $id ) ? $id : '';
		}
	}

	return '';
}

/**
 * Builds an id from heading text that isn't in use yet, and reserves it.
 *
 * @param string $text Heading text.
 * @param array  $used Ids in use, as keys. Updated in place.
 * @return string
 */
function praxis_unique_heading_id( $text, &$used ) {
	$base = sanitize_title( $text );
	if ( '' === $base ) {
		$base = 'section';
	}

	$id     = $base;
	$suffix = 2;
	while ( isset( $used[ $id ] ) ) {
		$id = $base . '-' . $suffix;
		++$suffix;
	}

	$used[ $id ] = true;
	return $id;
}

/**
 * Builds the nested list markup for the Table of Contents block.
 *
 * A heading goes inside the closest earlier heading with a lower level, so
 * skipped levels (an H4 straight after an H2) still nest sensibly.
 *
 * @param array  $headings     Headings from praxis_get_post_headings().
 * @param string $tag          List tag, 'ul' or 'ol'.
 * @param int    $index        Index to start at. Advanced past the headings used.
 * @param int    $parent_level Level of the heading this list sits under.
 * @return string
 */
function praxis_toc_list( $headings, $tag = 'ul', &$index = 0, $parent_level = 1 ) {
	$count = count( $headings );
	$html  = '<' . $tag . ' class="wp-block-praxis-table-of-contents__list">';

	while ( $index < $count && $headings[ $index ]['level'] > $parent_level ) {
		$heading = $headings[ $index ];
		++$index;

		$html .= sprintf( '<li><a href="#%1$s">%2$s</a>', esc_attr( $heading['id'] ), esc_html( $heading['text'] ) );

		if ( $index < $count && $headings[ $index ]['level'] > $heading['level'] ) {
			$html .= praxis_toc_list( $headings, $tag, $index, $heading['level'] );
		}

		$html .= '</li>';
	}

	return $html . '</' . $tag . '>';
}

/**
 * Tracks which post's content is being rendered.
 *
 * Runs on `the_content` just before blocks are rendered (do_blocks runs at
 * priority 9). Pushes the post and a fresh queue of its generated ids, keyed
 * by heading text, for praxis_add_heading_anchor() to use.
 *
 * @param string $content Post content.
 * @return string Unchanged content.
 */
function praxis_start_heading_anchors( $content ) {
	global $praxis_heading_anchors;

	$queue = array();
	foreach ( praxis_get_post_headings( get_the_ID() ) as $heading ) {
		if ( $heading['generated'] ) {
			$queue[ $heading['text'] ][] = $heading['id'];
		}
	}

	$praxis_heading_anchors[] = $queue;
	return $content;
}
add_filter( 'the_content', 'praxis_start_heading_anchors', 8 );

/**
 * Stops tracking the post once its blocks are rendered.
 *
 * @param string $content Rendered content.
 * @return string Unchanged content.
 */
function praxis_end_heading_anchors( $content ) {
	global $praxis_heading_anchors;

	if ( ! empty( $praxis_heading_anchors ) ) {
		array_pop( $praxis_heading_anchors );
	}

	return $content;
}
add_filter( 'the_content', 'praxis_end_heading_anchors', 10 );

/**
 * Adds the generated id to a Heading block inside post content.
 *
 * Headings outside post content (in templates, for example) and headings
 * that already have an id are left alone.
 *
 * @param string $block_content Rendered block.
 * @return string
 */
function praxis_add_heading_anchor( $block_content ) {
	global $praxis_heading_anchors;

	if ( empty( $praxis_heading_anchors ) ) {
		return $block_content;
	}

	$current = count( $praxis_heading_anchors ) - 1;
	$text    = praxis_heading_text( $block_content );

	if ( empty( $praxis_heading_anchors[ $current ][ $text ] ) ) {
		return $block_content;
	}

	$tags = new WP_HTML_Tag_Processor( $block_content );
	while ( $tags->next_tag() ) {
		if ( ! preg_match( '/^H[1-6]$/', $tags->get_tag() ) ) {
			continue;
		}

		if ( null === $tags->get_attribute( 'id' ) ) {
			$tags->set_attribute( 'id', array_shift( $praxis_heading_anchors[ $current ][ $text ] ) );
		}
		break;
	}

	return $tags->get_updated_html();
}
add_filter( 'render_block_core/heading', 'praxis_add_heading_anchor' );
