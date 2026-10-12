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
