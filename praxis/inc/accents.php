<?php
/**
 * Block accents: palette colors on the details of core blocks.
 *
 * Everything that draws an accent (quote bars, separators, list markers,
 * table header rules, accordion and details toggles, the selected tab…)
 * reads the `--praxis-accent` CSS variable and falls back to the theme's
 * normal color when it isn't set. So:
 *
 * - With accents off (Appearance → Praxis), the variable is never set and
 *   blocks look exactly as the theme styles them.
 * - With accents on, :root sets it to the site's default accent color, and
 *   assets/css/accents.css adds the few touches that only exist with
 *   accents (list markers, table header rule, code edge, link underlines).
 * - Any supported block can pick its own palette color in the editor
 *   (attribute `praxisAccent`). It's stored only in the block comment and
 *   applied when rendering, so saved markup never changes and blocks stay
 *   valid if the theme is switched.
 *
 * Accents never change text colors, so readability doesn't depend on them.
 *
 * @package Praxis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether block accents are turned on.
 *
 * @return bool
 */
function praxis_accents_enabled() {
	return (bool) apply_filters( 'praxis_block_accents', (bool) praxis_get_setting( 'blockAccents' ) );
}

/**
 * Returns the blocks that offer an accent color setting.
 *
 * Containers are included because the accent is inherited: a Group set to
 * Accent recolors every quote, list and separator inside it.
 *
 * @return string[]
 */
function praxis_accent_blocks() {
	return apply_filters(
		'praxis_accent_blocks',
		array(
			'core/accordion',
			'core/code',
			'core/column',
			'core/columns',
			'core/details',
			'core/group',
			'core/icon',
			'core/list',
			'core/navigation',
			'core/paragraph',
			'core/preformatted',
			'core/pullquote',
			'core/quote',
			'core/separator',
			'core/table',
			'core/tabs',
			'core/verse',
			'praxis/callout',
			'praxis/table-of-contents',
		)
	);
}

/**
 * Returns the CSS value for a palette color slug.
 *
 * Falls back to Primary if a style variation doesn't define the color.
 *
 * @param string $slug Palette slug.
 * @return string
 */
function praxis_accent_value( $slug ) {
	$slug = sanitize_key( $slug );

	return 'primary' === $slug
		? 'var(--wp--preset--color--primary)'
		: sprintf( 'var(--wp--preset--color--%s, var(--wp--preset--color--primary))', $slug );
}

/**
 * Registers the `praxisAccent` attribute on supported blocks.
 *
 * Registered even when accents are off, so dynamic blocks that render
 * through the REST API don't reject content saved with an accent.
 *
 * @param array  $args       Block type arguments.
 * @param string $block_type Block name.
 * @return array
 */
function praxis_accent_block_type_args( $args, $block_type ) {
	if ( in_array( $block_type, praxis_accent_blocks(), true ) ) {
		$args['attributes']                 = isset( $args['attributes'] ) ? $args['attributes'] : array();
		$args['attributes']['praxisAccent'] = array( 'type' => 'string' );
	}

	return $args;
}
add_filter( 'register_block_type_args', 'praxis_accent_block_type_args', 10, 2 );

/**
 * Applies a block's own accent color when it renders.
 *
 * @param string $block_content Rendered block.
 * @param array  $block         Parsed block.
 * @return string
 */
function praxis_render_block_accent( $block_content, $block ) {
	if ( empty( $block['attrs']['praxisAccent'] ) || '' === $block_content || ! praxis_accents_enabled() || ! in_array( $block['blockName'], praxis_accent_blocks(), true ) ) {
		return $block_content;
	}

	$tags = new WP_HTML_Tag_Processor( $block_content );
	if ( ! $tags->next_tag() ) {
		return $block_content;
	}

	$style = rtrim( trim( (string) $tags->get_attribute( 'style' ) ), ';' );
	$style = ( '' === $style ? '' : $style . ';' ) . '--praxis-accent:' . praxis_accent_value( $block['attrs']['praxisAccent'] );

	$tags->set_attribute( 'style', $style );
	$tags->add_class( 'has-praxis-accent' );

	return $tags->get_updated_html();
}
add_filter( 'render_block', 'praxis_render_block_accent', 10, 2 );

/**
 * Loads the accent stylesheet and sets the default accent, on the front end
 * and in the editor canvas.
 */
function praxis_enqueue_accents() {
	if ( ! praxis_accents_enabled() ) {
		return;
	}

	wp_enqueue_style( 'praxis-accents', PRAXIS_URI . '/assets/css/accents.css', array(), PRAXIS_VERSION );
	wp_style_add_data( 'praxis-accents', 'path', PRAXIS_DIR . '/assets/css/accents.css' );
	wp_add_inline_style(
		'praxis-accents',
		sprintf( ':root{--praxis-accent:%s;}', praxis_accent_value( praxis_get_setting( 'accentColor' ) ) )
	);
}
add_action( 'enqueue_block_assets', 'praxis_enqueue_accents' );

/**
 * Adds the "Accent color" control to the block editor.
 */
function praxis_enqueue_accent_control() {
	$asset_file = PRAXIS_DIR . '/build/js/accent-control.asset.php';
	if ( ! praxis_accents_enabled() || ! file_exists( $asset_file ) ) {
		return;
	}

	$asset = require $asset_file;

	wp_enqueue_script( 'praxis-accent-control', PRAXIS_URI . '/build/js/accent-control.js', $asset['dependencies'], $asset['version'], true );
	wp_set_script_translations( 'praxis-accent-control', 'praxis', PRAXIS_DIR . '/languages' );
	wp_add_inline_script(
		'praxis-accent-control',
		'window.praxisAccents = ' . wp_json_encode(
			array(
				'blocks'        => praxis_accent_blocks(),
				'defaultAccent' => sanitize_key( praxis_get_setting( 'accentColor' ) ),
			)
		) . ';',
		'before'
	);
}
add_action( 'enqueue_block_editor_assets', 'praxis_enqueue_accent_control' );
