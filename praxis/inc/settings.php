<?php
/**
 * Theme settings and the Appearance → Praxis page.
 *
 * Settings are one option, `praxis_settings`, registered with show_in_rest
 * so the React page in src/admin/settings.js reads and saves it through the
 * core /wp/v2/settings endpoint. Design settings stay in Styles; this page is
 * for theme behaviour that the Site Editor has no place for.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const PRAXIS_SETTINGS_OPTION = 'praxis_settings';

/**
 * Returns the default settings.
 *
 * @return array
 */
function praxis_default_settings() {
	return array(
		'blockAccents' => true,
		'accentColor'  => 'primary',
	);
}

/**
 * Returns one setting, falling back to its default.
 *
 * @param string $key Setting name, e.g. 'blockAccents'.
 * @return mixed
 */
function praxis_get_setting( $key ) {
	$settings = get_option( PRAXIS_SETTINGS_OPTION, array() );
	$settings = ( is_array( $settings ) ? $settings : array() ) + praxis_default_settings();

	return isset( $settings[ $key ] ) ? $settings[ $key ] : null;
}

/**
 * Registers the settings option, exposed to the REST API.
 */
function praxis_register_settings() {
	register_setting(
		'praxis',
		PRAXIS_SETTINGS_OPTION,
		array(
			'type'              => 'object',
			'description'       => __( 'Praxis theme settings.', 'praxis' ),
			'default'           => praxis_default_settings(),
			'sanitize_callback' => 'praxis_sanitize_settings',
			'show_in_rest'      => array(
				'schema' => array(
					'type'                 => 'object',
					'additionalProperties' => false,
					'properties'           => array(
						'blockAccents' => array( 'type' => 'boolean' ),
						'accentColor'  => array( 'type' => 'string' ),
					),
				),
			),
		)
	);
}
add_action( 'init', 'praxis_register_settings' );

/**
 * Sanitizes the settings option.
 *
 * @param mixed $value Submitted value.
 * @return array
 */
function praxis_sanitize_settings( $value ) {
	$value    = is_array( $value ) ? $value : array();
	$defaults = praxis_default_settings();
	$accent   = isset( $value['accentColor'] ) ? sanitize_key( $value['accentColor'] ) : '';
	$palette  = wp_list_pluck( praxis_get_palette(), 'slug' );

	// Only accept colors from the palette (when there is one to check against).
	if ( '' === $accent || ( $palette && ! in_array( $accent, $palette, true ) ) ) {
		$accent = $defaults['accentColor'];
	}

	return array(
		'blockAccents' => isset( $value['blockAccents'] ) ? (bool) $value['blockAccents'] : $defaults['blockAccents'],
		'accentColor'  => $accent,
	);
}

/**
 * Returns the active theme palette as a list of slug, name and color.
 *
 * @return array[]
 */
function praxis_get_palette() {
	$palette = wp_get_global_settings( array( 'color', 'palette', 'theme' ) );

	return is_array( $palette ) ? array_values( $palette ) : array();
}

/**
 * Adds Appearance → Praxis.
 */
function praxis_add_settings_page() {
	add_theme_page(
		__( 'Praxis', 'praxis' ),
		__( 'Praxis', 'praxis' ),
		'manage_options',
		'praxis',
		'praxis_render_settings_page'
	);
}
add_action( 'admin_menu', 'praxis_add_settings_page' );

/**
 * Prints the settings page shell. The React app in src/admin/settings.js
 * renders into it.
 */
function praxis_render_settings_page() {
	printf(
		'<div class="wrap"><h1>%s</h1><div id="praxis-settings"></div></div>',
		esc_html__( 'Praxis', 'praxis' )
	);
}

/**
 * Loads the settings app on its own page only.
 *
 * @param string $hook_suffix Current admin page.
 */
function praxis_enqueue_settings_page( $hook_suffix ) {
	if ( 'appearance_page_praxis' !== $hook_suffix ) {
		return;
	}

	$asset_file = PRAXIS_DIR . '/build/js/settings.asset.php';
	if ( ! file_exists( $asset_file ) ) {
		return;
	}

	$asset = require $asset_file;

	wp_enqueue_script( 'praxis-settings', PRAXIS_URI . '/build/js/settings.js', $asset['dependencies'], $asset['version'], true );
	wp_set_script_translations( 'praxis-settings', 'praxis', PRAXIS_DIR . '/languages' );
	wp_add_inline_script(
		'praxis-settings',
		'window.praxisSettingsPage = ' . wp_json_encode(
			array(
				'palette'  => praxis_get_palette(),
				'defaults' => praxis_default_settings(),
			)
		) . ';',
		'before'
	);
	wp_enqueue_style( 'wp-components' );
}
add_action( 'admin_enqueue_scripts', 'praxis_enqueue_settings_page' );
