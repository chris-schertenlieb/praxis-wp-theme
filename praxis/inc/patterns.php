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
 */
function praxis_register_pattern_categories() {
	register_block_pattern_category(
		'praxis',
		array( 'label' => __( 'Praxis', 'praxis' ) )
	);
}
add_action( 'init', 'praxis_register_pattern_categories' );
