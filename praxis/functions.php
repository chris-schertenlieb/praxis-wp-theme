<?php
/**
 * Praxis functions and definitions.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PRAXIS_VERSION', wp_get_theme( 'praxis' )->get( 'Version' ) );
define( 'PRAXIS_DIR', get_template_directory() );
define( 'PRAXIS_URI', get_template_directory_uri() );

require_once PRAXIS_DIR . '/inc/setup.php';
require_once PRAXIS_DIR . '/inc/blocks.php';
require_once PRAXIS_DIR . '/inc/patterns.php';
require_once PRAXIS_DIR . '/inc/starter-content.php';

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once PRAXIS_DIR . '/inc/cli.php';
}
