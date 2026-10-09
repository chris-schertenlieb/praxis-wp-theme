<?php
/**
 * Custom block registration.
 *
 * Blocks are authored in src/blocks/ and compiled to build/blocks/ by
 * `npm run build`, which also generates build/blocks/blocks-manifest.php.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers every block found in the compiled blocks manifest.
 */
function praxis_register_blocks() {
	$build_dir = PRAXIS_DIR . '/build/blocks';
	$manifest  = $build_dir . '/blocks-manifest.php';

	if ( ! file_exists( $manifest ) ) {
		return;
	}

	wp_register_block_types_from_metadata_collection( $build_dir, $manifest );
}
add_action( 'init', 'praxis_register_blocks' );

/**
 * Registers block styles for core blocks.
 *
 * Their CSS lives in assets/css/theme.css.
 */
function praxis_register_block_styles() {
	register_block_style(
		'core/group',
		array(
			'name'  => 'praxis-sticky',
			'label' => __( 'Sticky header', 'praxis' ),
		)
	);
}
add_action( 'init', 'praxis_register_block_styles' );

/**
 * Adds a "Praxis" category to the block inserter.
 *
 * @param array $categories Existing block categories.
 * @return array
 */
function praxis_block_categories( $categories ) {
	array_unshift(
		$categories,
		array(
			'slug'  => 'praxis',
			'title' => __( 'Praxis', 'praxis' ),
		)
	);

	return $categories;
}
add_filter( 'block_categories_all', 'praxis_block_categories' );

/**
 * Shows an admin notice when blocks haven't been built yet.
 */
function praxis_missing_build_notice() {
	if ( file_exists( PRAXIS_DIR . '/build/blocks/blocks-manifest.php' ) || ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	printf(
		'<div class="notice notice-warning"><p>%s</p></div>',
		esc_html__( 'Praxis: custom blocks have not been built. Run `npm install && npm run build` in the theme directory.', 'praxis' )
	);
}
add_action( 'admin_notices', 'praxis_missing_build_notice' );

/**
 * Enqueues per-block stylesheets for core blocks from assets/css/blocks/.
 *
 * A file named core-<block>.css is loaded only on pages that contain that
 * block, and in the editor. Use it for the few rules theme.json can't express.
 */
function praxis_enqueue_block_styles() {
	foreach ( glob( PRAXIS_DIR . '/assets/css/blocks/core-*.css' ) as $file ) {
		$slug = basename( $file, '.css' );
		$name = 'core/' . substr( $slug, strlen( 'core-' ) );

		wp_enqueue_block_style(
			$name,
			array(
				'handle' => 'praxis-' . $slug,
				'src'    => PRAXIS_URI . '/assets/css/blocks/' . $slug . '.css',
				'path'   => $file,
				'ver'    => PRAXIS_VERSION,
			)
		);
	}
}
add_action( 'init', 'praxis_enqueue_block_styles' );
