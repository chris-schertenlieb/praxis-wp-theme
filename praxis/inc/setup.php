<?php
/**
 * Theme setup and asset loading.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers theme supports.
 */
function praxis_setup() {
	load_theme_textdomain( 'praxis', PRAXIS_DIR . '/languages' );

	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'praxis_setup' );

/**
 * Enqueues front-end styles.
 *
 * The `path` lets WordPress print the stylesheet inline in the head, as it
 * does for block styles, instead of loading it as a render-blocking file
 * (see wp_maybe_inline_styles() and the styles_inline_size_limit filter).
 */
function praxis_enqueue_styles() {
	wp_enqueue_style(
		'praxis-style',
		PRAXIS_URI . '/assets/css/theme.css',
		array(),
		PRAXIS_VERSION
	);
	wp_style_add_data( 'praxis-style', 'path', PRAXIS_DIR . '/assets/css/theme.css' );
}
add_action( 'wp_enqueue_scripts', 'praxis_enqueue_styles' );

/**
 * Preloads the fonts used for body text and headings.
 *
 * Without a preload the browser only finds them after it has parsed the
 * global styles and laid out the page. The fonts are read from the active
 * styles, so a style variation or a font picked in Styles is preloaded
 * instead. Only the regular latin face of each is preloaded: the one nearly
 * every page uses. Filter `praxis_preload_fonts` to change the list.
 *
 * @param array $resources Resources to preload.
 * @return array
 */
function praxis_preload_fonts( $resources ) {
	$slugs = array();
	foreach ( array( array( 'typography', 'fontFamily' ), array( 'elements', 'heading', 'typography', 'fontFamily' ) ) as $path ) {
		$value = wp_get_global_styles( $path );
		if ( is_string( $value ) && preg_match( '/font-family(?:--|\|)([a-z0-9-]+)/', $value, $match ) ) {
			$slugs[] = $match[1];
		}
	}

	$families = array();
	foreach ( (array) wp_get_global_settings( array( 'typography', 'fontFamilies' ) ) as $origin ) {
		foreach ( (array) $origin as $family ) {
			if ( isset( $family['slug'] ) ) {
				$families[ $family['slug'] ] = $family;
			}
		}
	}

	$urls = array();
	foreach ( array_unique( $slugs ) as $slug ) {
		$faces = isset( $families[ $slug ]['fontFace'] ) ? $families[ $slug ]['fontFace'] : array();
		foreach ( $faces as $face ) {
			$style = isset( $face['fontStyle'] ) ? $face['fontStyle'] : 'normal';
			$range = isset( $face['unicodeRange'] ) ? $face['unicodeRange'] : '';
			if ( 'normal' !== $style || ( '' !== $range && false === strpos( $range, 'U+0000-00FF' ) ) ) {
				continue;
			}
			foreach ( (array) $face['src'] as $src ) {
				if ( '.woff2' === substr( $src, -6 ) ) {
					$urls[] = 0 === strpos( $src, 'file:./' ) ? get_theme_file_uri( substr( $src, 7 ) ) : $src;
					break 2;
				}
			}
		}
	}

	foreach ( apply_filters( 'praxis_preload_fonts', array_unique( $urls ) ) as $url ) {
		$resources[] = array(
			'href'        => $url,
			'as'          => 'font',
			'type'        => 'font/woff2',
			'crossorigin' => 'anonymous',
		);
	}

	return $resources;
}
add_filter( 'wp_preload_resources', 'praxis_preload_fonts' );
