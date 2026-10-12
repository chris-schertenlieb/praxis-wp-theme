<?php
/**
 * Block pattern categories.
 *
 * Patterns themselves live in /patterns and are registered automatically
 * by WordPress from their file headers.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers theme pattern categories.
 *
 * Section patterns also list the matching core category (banner,
 * call-to-action, testimonials…) so they show up in both places.
 */
function praxis_register_pattern_categories() {
	$categories = array(
		'praxis-hero'         => array( __( 'Praxis: Heroes', 'praxis' ), __( 'Large opening sections with a headline and call to action.', 'praxis' ) ),
		'praxis-features'     => array( __( 'Praxis: Features', 'praxis' ), __( 'Feature grids, media and text, and block showcases.', 'praxis' ) ),
		'praxis-social-proof' => array( __( 'Praxis: Social proof', 'praxis' ), __( 'Testimonials, logos and stats.', 'praxis' ) ),
		'praxis-pricing'      => array( __( 'Praxis: Pricing', 'praxis' ), __( 'Pricing tables and plans.', 'praxis' ) ),
		'praxis-faq'          => array( __( 'Praxis: FAQ', 'praxis' ), __( 'Frequently asked questions built with the Details block.', 'praxis' ) ),
		'praxis-team'         => array( __( 'Praxis: Team', 'praxis' ), __( 'Team members and bios.', 'praxis' ) ),
		'praxis-contact'      => array( __( 'Praxis: Contact', 'praxis' ), __( 'Contact details and ways to get in touch.', 'praxis' ) ),
		'praxis-cta'          => array( __( 'Praxis: Calls to action', 'praxis' ), __( 'Sections that ask the reader to take the next step.', 'praxis' ) ),
		'praxis-posts'        => array( __( 'Praxis: Posts', 'praxis' ), __( 'Recent posts from the blog.', 'praxis' ) ),
		'praxis-pages'        => array( __( 'Praxis: Pages', 'praxis' ), __( 'Full page layouts to start a new page from.', 'praxis' ) ),
	);

	foreach ( $categories as $slug => $category ) {
		register_block_pattern_category(
			$slug,
			array(
				'label'       => $category[0],
				'description' => $category[1],
			)
		);
	}
}
add_action( 'init', 'praxis_register_pattern_categories' );

/**
 * Returns the URL of a theme image in assets/images/.
 *
 * @param string $file File name, e.g. 'avatar-1.svg'.
 * @return string
 */
function praxis_image_url( $file ) {
	return get_theme_file_uri( 'assets/images/' . $file );
}

/**
 * Returns a link target for pattern buttons.
 *
 * Points at the sample page for $key when it exists, so buttons work on a
 * fresh install, and falls back to '#' for the user to fill in.
 *
 * @param string $key Sample page key, e.g. 'contact' or 'about'.
 * @return string
 */
function praxis_pattern_link( $key ) {
	$url = praxis_get_sample_page_url( $key );

	return $url ? $url : '#';
}

/**
 * Returns the URL of the posts page, or the home page if there isn't one.
 *
 * @return string
 */
function praxis_posts_page_url() {
	$posts_page = (int) get_option( 'page_for_posts' );

	if ( 'page' === get_option( 'show_on_front' ) && $posts_page && 'publish' === get_post_status( $posts_page ) ) {
		return get_permalink( $posts_page );
	}

	return home_url( '/' );
}

/**
 * Returns a pattern's block markup with nested Pattern blocks expanded.
 *
 * Page patterns reference section patterns with `<!-- wp:pattern -->`, which
 * the editor expands on insert. Content created in PHP (the starter pages)
 * needs the same treatment, or it would keep following the theme's files
 * instead of being ordinary, editable blocks.
 *
 * @param string $slug  Pattern slug, e.g. 'praxis/page-landing'.
 * @param int    $depth Internal recursion guard.
 * @return string Block markup, or an empty string if the pattern doesn't exist.
 */
function praxis_get_pattern_markup( $slug, $depth = 0 ) {
	$pattern = WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );

	if ( ! $pattern || $depth > 5 ) {
		return '';
	}

	$markup = '';
	foreach ( parse_blocks( $pattern['content'] ) as $block ) {
		if ( 'core/pattern' === $block['blockName'] ) {
			$nested  = isset( $block['attrs']['slug'] ) ? praxis_get_pattern_markup( $block['attrs']['slug'], $depth + 1 ) : '';
			$markup .= $nested ? $nested . "\n\n" : '';
		} elseif ( $block['blockName'] ) {
			$markup .= serialize_block( $block ) . "\n\n";
		}
	}

	return trim( $markup );
}

/**
 * Returns the palettes of the active theme and its style variations.
 *
 * Used by the style variations pattern to draw a preview card for each one.
 * Full variations (Dark, Warm…) come before color-only presets, and a
 * palette that repeats an earlier one is skipped.
 *
 * @return array[] List of arrays with 'title' and 'colors' (slug => hex).
 */
function praxis_style_variation_palettes() {
	$variations = WP_Theme_JSON_Resolver::get_style_variations();

	usort(
		$variations,
		function ( $a, $b ) {
			return (int) empty( $a['styles'] ) - (int) empty( $b['styles'] );
		}
	);

	array_unshift(
		$variations,
		array( 'title' => __( 'Default', 'praxis' ) ) + WP_Theme_JSON_Resolver::get_theme_data()->get_raw_data()
	);

	$palettes = array();
	foreach ( $variations as $variation ) {
		$palette = isset( $variation['settings']['color']['palette'] ) ? $variation['settings']['color']['palette'] : array();
		$palette = isset( $palette['theme'] ) ? $palette['theme'] : $palette;
		$colors  = wp_list_pluck( $palette, 'color', 'slug' );
		$key     = md5( implode( ',', $colors ) );

		if ( empty( $colors['base'] ) || isset( $palettes[ $key ] ) ) {
			continue;
		}

		$palettes[ $key ] = array(
			'title'  => $variation['title'],
			'colors' => $colors,
		);
	}

	return array_values( $palettes );
}

/**
 * Returns Navigation block attributes for use in a pattern.
 *
 * Points the block at the sample menu for $location when it still exists.
 * Without a ref, core falls back to the most recent menu or a page list.
 *
 * @param string $location 'primary' or 'footer'.
 * @param array  $attrs    Other Navigation block attributes.
 * @return array
 */
function praxis_navigation_attrs( $location, $attrs ) {
	$nav_id = praxis_get_sample_navigation_id( $location );
	if ( $nav_id ) {
		$attrs = array( 'ref' => $nav_id ) + $attrs;
	}

	return $attrs;
}

/**
 * Returns the copyright line used by the footer patterns.
 *
 * @return string
 */
function praxis_copyright_text() {
	return sprintf(
		/* translators: 1: Current year, 2: Site name. */
		__( '© %1$s %2$s. Built with Praxis.', 'praxis' ),
		gmdate( 'Y' ),
		get_bloginfo( 'name' )
	);
}
