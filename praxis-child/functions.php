<?php
/**
 * Praxis Child functions and definitions.
 *
 * The parent theme's functions.php loads automatically before this file.
 *
 * @package Praxis_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues child theme styles after the parent theme's.
 *
 * Like the parent's, the stylesheet is printed inline while it's small.
 */
function praxis_child_enqueue_styles() {
	wp_enqueue_style(
		'praxis-child-style',
		get_stylesheet_uri(),
		array( 'praxis-style' ),
		wp_get_theme()->get( 'Version' )
	);
	wp_style_add_data( 'praxis-child-style', 'path', get_stylesheet_directory() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'praxis_child_enqueue_styles' );
