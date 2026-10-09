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
 */
function praxis_enqueue_styles() {
	wp_enqueue_style(
		'praxis-style',
		PRAXIS_URI . '/assets/css/theme.css',
		array(),
		PRAXIS_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'praxis_enqueue_styles' );
