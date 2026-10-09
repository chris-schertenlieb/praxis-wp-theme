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
 */
function praxis_child_enqueue_styles() {
	wp_enqueue_style(
		'praxis-child-style',
		get_stylesheet_uri(),
		array( 'praxis-style' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'praxis_child_enqueue_styles' );
