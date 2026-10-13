<?php
/**
 * Sample content installed on theme activation.
 *
 * When Praxis (or a child theme) is activated on an empty site, this creates
 * Home, About, Blog, Contact and Pattern demo pages, Primary and Footer Navigation menus
 * (wp_navigation posts) that the header and footer patterns point at, and
 * makes Home, built from the Landing page pattern, the static front page.
 * Everything created is ordinary, Site-Editor-editable content flagged with
 * the `_praxis_sample_content` meta key, and it only runs once per site.
 *
 * Disable with: add_filter( 'praxis_install_sample_content', '__return_false' );
 * Re-run with:  wp praxis starter-content --force (see inc/cli.php)
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

	praxis_install_starter_content();
}
add_action( 'after_switch_theme', 'praxis_maybe_install_sample_content' );

/**
 * Returns the sample pages, keyed by the name stored in the option.
 *
 * @return array[] Each with a 'title' and the 'pattern' its content comes from.
 */
function praxis_starter_pages() {
	return array(
		'home'    => array(
			'title'   => __( 'Home', 'praxis' ),
			'pattern' => 'praxis/page-landing',
		),
		'about'   => array(
			'title'   => __( 'About', 'praxis' ),
			'pattern' => 'praxis/page-about',
		),
		'blog'    => array(
			'title'   => __( 'Blog', 'praxis' ),
			'pattern' => '',
		),
		'contact' => array(
			'title'   => __( 'Contact', 'praxis' ),
			'pattern' => 'praxis/page-contact',
		),
		'demo'    => array(
			'title'   => __( 'Pattern demo', 'praxis' ),
			'pattern' => 'praxis/page-demo',
		),
	);
}

/**
 * Installs the starter content, or resets it.
 *
 * Pages and menus recorded in the option that still exist are reused, so
 * running this again never creates duplicates.
 *
 * @param bool $reset Also restore existing sample pages and menus to the
 *                    theme's current patterns, and set the front page even
 *                    if the site already has one.
 * @return array The saved starter content option.
 */
function praxis_install_starter_content( $reset = false ) {
	$starter  = get_option( PRAXIS_STARTER_OPTION );
	$starter  = ( is_array( $starter ) ? $starter : array() ) + array(
		'pages'      => array(),
		'navigation' => array(),
	);
	$pages    = praxis_starter_pages();
	$new      = array();
	$had_kses = false !== has_filter( 'content_save_pre', 'wp_filter_post_kses' );

	// The content is the theme's own trusted markup; kses would strip the
	// inline styles that blocks save (e.g. color-mix() colors).
	if ( $had_kses ) {
		kses_remove_filters();
	}

	// Pages come first and are saved straight away, so the patterns that
	// build their content can link to them (praxis_pattern_link()).
	foreach ( $pages as $key => $page ) {
		if ( ! praxis_sample_post_exists( $starter['pages'], $key, 'page' ) ) {
			$starter['pages'][ $key ] = praxis_insert_sample_post( 'page', $page['title'] );
			$new[]                    = $key;
		}
	}
	$starter['pages'] = array_filter( $starter['pages'] );
	update_option( PRAXIS_STARTER_OPTION, $starter );

	foreach ( $pages as $key => $page ) {
		if ( ! $page['pattern'] || empty( $starter['pages'][ $key ] ) || ( ! $reset && ! in_array( $key, $new, true ) ) ) {
			continue;
		}

		wp_update_post(
			array(
				'ID'           => $starter['pages'][ $key ],
				'post_status'  => 'publish',
				'post_content' => wp_slash( praxis_get_pattern_markup( $page['pattern'] ) ),
			)
		);
		update_post_meta( $starter['pages'][ $key ], '_wp_page_template', 'page-no-title' );
	}

	// Footer is created first so that, if the header pattern ever renders
	// without a ref, core's Navigation fallback (most recent menu) picks the primary menu.
	$menus = array(
		'footer'  => array(
			'title' => __( 'Footer', 'praxis' ),
			'links' => array( 'about', 'blog', 'contact', 'demo' ),
		),
		'primary' => array(
			'title' => __( 'Primary', 'praxis' ),
			'links' => array( 'home', 'about', 'blog', 'contact' ),
		),
	);

	foreach ( $menus as $location => $menu ) {
		$links = array();
		foreach ( $menu['links'] as $key ) {
			$page_id = isset( $starter['pages'][ $key ] ) ? $starter['pages'][ $key ] : 0;
			$links[] = 'home' === $key ? praxis_custom_link_block( __( 'Home', 'praxis' ), home_url( '/' ) ) : praxis_page_link_block( $page_id );
		}
		$content = serialize_blocks( array_filter( $links ) );

		if ( ! praxis_sample_post_exists( $starter['navigation'], $location, 'wp_navigation' ) ) {
			$starter['navigation'][ $location ] = praxis_insert_sample_post( 'wp_navigation', $menu['title'], $content );
		} elseif ( $reset ) {
			wp_update_post(
				array(
					'ID'           => $starter['navigation'][ $location ],
					'post_status'  => 'publish',
					'post_content' => wp_slash( $content ),
				)
			);
		}
	}
	$starter['navigation'] = array_filter( $starter['navigation'] );

	if ( $had_kses ) {
		kses_init_filters();
	}

	if ( ! empty( $starter['pages']['home'] ) && ( $reset || 'page' !== get_option( 'show_on_front' ) ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $starter['pages']['home'] );
		update_option( 'page_for_posts', isset( $starter['pages']['blog'] ) ? $starter['pages']['blog'] : 0 );
	}

	if ( '' === get_option( 'blogdescription' ) || 'Just another WordPress site' === get_option( 'blogdescription' ) ) {
		update_option( 'blogdescription', __( 'A site built with the Praxis block theme', 'praxis' ) );
	}

	update_option( PRAXIS_STARTER_OPTION, $starter );

	return $starter;
}

/**
 * Whether the site has no real content yet.
 *
 * A site counts as empty if it has no Navigation menus and no static front
 * page, and either is still a "fresh site" or holds nothing beyond
 * WordPress's default post and page.
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

	if ( $existing_navigation || ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) ) {
		return false;
	}

	if ( get_option( 'fresh_site' ) ) {
		return true;
	}

	return wp_count_posts( 'page' )->publish <= 1 && wp_count_posts( 'post' )->publish <= 1;
}

/**
 * Whether a sample post recorded in the option still exists.
 *
 * Trashed posts count as gone, so they get recreated rather than restored.
 *
 * @param array  $ids       Recorded IDs, keyed by name.
 * @param string $key       Name to look up.
 * @param string $post_type Expected post type.
 * @return bool
 */
function praxis_sample_post_exists( $ids, $key, $post_type ) {
	$id = isset( $ids[ $key ] ) ? (int) $ids[ $key ] : 0;

	return $id && get_post_type( $id ) === $post_type && 'trash' !== get_post_status( $id );
}

/**
 * Creates a published sample post (page or Navigation menu).
 *
 * @param string $post_type Post type.
 * @param string $title     Post title.
 * @param string $content   Block markup.
 * @return int Post ID, or 0 on failure.
 */
function praxis_insert_sample_post( $post_type, $title, $content = '' ) {
	$post_id = wp_insert_post(
		array(
			'post_type'    => $post_type,
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_content' => wp_slash( $content ),
			'meta_input'   => array( '_praxis_sample_content' => 1 ),
		)
	);

	return is_wp_error( $post_id ) ? 0 : $post_id;
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
 * @param string $key 'home', 'about', 'blog', 'contact' or 'demo'.
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
