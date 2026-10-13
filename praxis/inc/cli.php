<?php
/**
 * WP-CLI commands. Loaded only when WP-CLI is running.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Installs the Praxis starter content.
 *
 * Creates Home, About, Blog, Contact and Pattern demo pages from the theme's page
 * patterns, the Primary and Footer menus, and makes Home (the landing page)
 * the static front page. Without --force this does exactly what activating
 * the theme does: nothing, unless the site is empty and it hasn't run before.
 *
 * ## OPTIONS
 *
 * [--force]
 * : Install even if starter content already ran or the site has content.
 * Sample pages and menus that still exist are reused and reset to the
 * theme's current patterns, and Home becomes the front page. Nothing else
 * on the site is changed.
 *
 * [--yes]
 * : Skip the confirmation prompt for --force.
 *
 * ## EXAMPLES
 *
 *     # Install on an empty site.
 *     $ wp praxis starter-content
 *
 *     # Recreate or reset the sample pages and landing page.
 *     $ wp praxis starter-content --force --yes
 *
 * @param array $args       Positional arguments (unused).
 * @param array $assoc_args Associative arguments.
 */
function praxis_cli_starter_content( $args, $assoc_args ) {
	$force = (bool) WP_CLI\Utils\get_flag_value( $assoc_args, 'force', false );

	if ( $force ) {
		WP_CLI::confirm( 'This resets the Praxis sample pages and menus and makes the landing page the front page. Continue?', $assoc_args );
	} elseif ( false !== get_option( PRAXIS_STARTER_OPTION ) ) {
		WP_CLI::warning( 'Starter content has already run on this site. Use --force to reinstall it.' );
		return;
	} elseif ( ! apply_filters( 'praxis_install_sample_content', praxis_is_empty_site() ) ) {
		WP_CLI::warning( 'This site already has content, so starter content was skipped. Use --force to install it anyway.' );
		return;
	}

	$starter = praxis_install_starter_content( $force );

	foreach ( $starter['pages'] as $page_id ) {
		WP_CLI::log( sprintf( '%-14s %s', get_the_title( $page_id ), get_permalink( $page_id ) ) );
	}

	WP_CLI::success( 'Starter content installed.' );
}

WP_CLI::add_command( 'praxis starter-content', 'praxis_cli_starter_content' );
