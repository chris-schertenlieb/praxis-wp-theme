<?php
/**
 * Sample content installed on theme activation.
 *
 * When Praxis (or a child theme) is activated on an empty site, this creates
 * a few sample pages and two Navigation menus (wp_navigation posts) that the
 * header and footer patterns point at. Everything created is ordinary,
 * Site-Editor-editable content flagged with the `_praxis_sample_content` meta
 * key, and it only ever runs once per site.
 *
 * Disable with: add_filter( 'praxis_install_sample_content', '__return_false' );
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const PRAXIS_STARTER_OPTION = 'praxis_starter_content';

/**
 * Seeds sample content after the theme is activated.
 */
function praxis_maybe_install_sample_content() {
	if ( false !== get_option( PRAXIS_STARTER_OPTION ) ) {
		return;
	}

	if ( ! apply_filters( 'praxis_install_sample_content', praxis_is_empty_site() ) ) {
		// Remember the decision so a later re-activation doesn't seed a now-populated site.
		update_option( PRAXIS_STARTER_OPTION, array() );
		return;
	}

	$pages = array(
		'about'   => praxis_insert_sample_page(
			__( 'About', 'praxis' ),
			__( 'This is a sample About page created by the Praxis theme. Edit or delete it from Pages.', 'praxis' )
		),
		'contact' => praxis_insert_sample_page(
			__( 'Contact', 'praxis' ),
			__( 'This is a sample Contact page created by the Praxis theme. Add a form or your contact details here.', 'praxis' )
		),
	);

	// Footer is created first so that, if the header pattern ever renders
	// without a ref, core's Navigation fallback (most recent menu) picks the primary menu.
	$footer_nav = praxis_insert_sample_navigation(
		__( 'Footer', 'praxis' ),
		array(
			praxis_page_link_block( $pages['about'] ),
			praxis_page_link_block( $pages['contact'] ),
		)
	);

	$primary_nav = praxis_insert_sample_navigation(
		__( 'Primary', 'praxis' ),
		array(
			praxis_custom_link_block( __( 'Home', 'praxis' ), home_url( '/' ) ),
			praxis_page_link_block( $pages['about'] ),
			praxis_page_link_block( $pages['contact'] ),
		)
	);

	if ( '' === get_option( 'blogdescription' ) || 'Just another WordPress site' === get_option( 'blogdescription' ) ) {
		update_option( 'blogdescription', __( 'A site built with the Praxis block theme', 'praxis' ) );
	}

	update_option(
		PRAXIS_STARTER_OPTION,
		array(
			'pages'      => array_filter( $pages ),
			'navigation' => array_filter(
				array(
					'primary' => $primary_nav,
					'footer'  => $footer_nav,
				)
			),
		)
	);
}
add_action( 'after_switch_theme', 'praxis_maybe_install_sample_content' );

/**
 * Whether the site has no real content yet.
 *
 * A site counts as empty if it has no Navigation menus and either is still a
 * "fresh site" or holds nothing beyond WordPress's default post and page.
 *
 * @return bool
 */
function praxis_is_empty_site() {
	$existing_navigation = get_posts(
		array(
			'post_type'   => 'wp_navigation',
			'post_status' => 'any',
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);

	if ( $existing_navigation ) {
		return false;
	}

	if ( get_option( 'fresh_site' ) ) {
		return true;
	}

	return wp_count_posts( 'page' )->publish <= 1 && wp_count_posts( 'post' )->publish <= 1;
}

/**
 * Creates a published sample page.
 *
 * @param string $title Page title.
 * @param string $text  Intro paragraph.
 * @return int Page ID, or 0 on failure.
 */
function praxis_insert_sample_page( $title, $text ) {
	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_content' => serialize_block(
				array(
					'blockName'    => 'core/paragraph',
					'attrs'        => array(),
					'innerBlocks'  => array(),
					'innerHTML'    => '<p>' . esc_html( $text ) . '</p>',
					'innerContent' => array( '<p>' . esc_html( $text ) . '</p>' ),
				)
			),
			'meta_input'   => array( '_praxis_sample_content' => 1 ),
		)
	);

	return is_wp_error( $page_id ) ? 0 : $page_id;
}

/**
 * Creates a published Navigation menu.
 *
 * @param string $title  Menu name shown in the Site Editor.
 * @param array  $blocks Parsed navigation-link blocks.
 * @return int Navigation post ID, or 0 on failure.
 */
function praxis_insert_sample_navigation( $title, $blocks ) {
	$nav_id = wp_insert_post(
		array(
			'post_type'    => 'wp_navigation',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_content' => serialize_blocks( array_filter( $blocks ) ),
			'meta_input'   => array( '_praxis_sample_content' => 1 ),
		)
	);

	return is_wp_error( $nav_id ) ? 0 : $nav_id;
}

/**
 * Builds a core/navigation-link block pointing at a page.
 *
 * @param int $page_id Page ID.
 * @return array|null Parsed block, or null if the page doesn't exist.
 */
function praxis_page_link_block( $page_id ) {
	if ( ! $page_id ) {
		return null;
	}

	return praxis_link_block(
		array(
			'label' => get_the_title( $page_id ),
			'type'  => 'page',
			'id'    => $page_id,
			'url'   => get_permalink( $page_id ),
			'kind'  => 'post-type',
		)
	);
}

/**
 * Builds a core/navigation-link block for an arbitrary URL.
 *
 * @param string $label Link text.
 * @param string $url   Link URL.
 * @return array Parsed block.
 */
function praxis_custom_link_block( $label, $url ) {
	return praxis_link_block(
		array(
			'label' => $label,
			'url'   => $url,
			'kind'  => 'custom',
		)
	);
}

/**
 * Builds a parsed core/navigation-link block.
 *
 * @param array $attrs Block attributes.
 * @return array Parsed block.
 */
function praxis_link_block( $attrs ) {
	return array(
		'blockName'    => 'core/navigation-link',
		'attrs'        => $attrs + array( 'isTopLevelLink' => true ),
		'innerBlocks'  => array(),
		'innerHTML'    => '',
		'innerContent' => array(),
	);
}

/**
 * Returns the ID of a sample Navigation menu, if it still exists.
 *
 * Used by the header and footer patterns to set the Navigation block's ref.
 *
 * @param string $location 'primary' or 'footer'.
 * @return int Navigation post ID, or 0.
 */
function praxis_get_sample_navigation_id( $location ) {
	$starter = get_option( PRAXIS_STARTER_OPTION, array() );
	$nav_id  = isset( $starter['navigation'][ $location ] ) ? (int) $starter['navigation'][ $location ] : 0;

	if ( ! $nav_id || 'wp_navigation' !== get_post_type( $nav_id ) || 'publish' !== get_post_status( $nav_id ) ) {
		return 0;
	}

	return $nav_id;
}

/**
 * Returns the URL of a sample page, if it still exists.
 *
 * @param string $key 'about' or 'contact'.
 * @return string Page URL, or an empty string.
 */
function praxis_get_sample_page_url( $key ) {
	$starter = get_option( PRAXIS_STARTER_OPTION, array() );
	$page_id = isset( $starter['pages'][ $key ] ) ? (int) $starter['pages'][ $key ] : 0;

	if ( ! $page_id || 'publish' !== get_post_status( $page_id ) ) {
		return '';
	}

	return get_permalink( $page_id );
}
