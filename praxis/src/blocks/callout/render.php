<?php
/**
 * Renders the Callout block.
 *
 * Wraps the saved inner blocks with the block's wrapper attributes, the type
 * class that sets the color and icon, and a label read out by screen readers.
 *
 * @package Praxis
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Rendered inner blocks.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$praxis_callout_labels = array(
	'note'    => __( 'Note', 'praxis' ),
	'tip'     => __( 'Tip', 'praxis' ),
	'warning' => __( 'Warning', 'praxis' ),
	'success' => __( 'Success', 'praxis' ),
);

$praxis_callout_type = isset( $attributes['type'], $praxis_callout_labels[ $attributes['type'] ] ) ? $attributes['type'] : 'note';

// Callouts saved by Praxis 0.1 hold their own wrapper and a paragraph until
// they're opened in the editor and migrated. Unwrap them so they aren't
// boxed twice.
$praxis_callout_content = $content;
if ( empty( $block->inner_blocks ) && preg_match( '#^\s*<div class="wp-block-praxis-callout[^"]*"[^>]*>(.*)</div>\s*$#s', $content, $praxis_callout_legacy ) ) {
	$praxis_callout_content = $praxis_callout_legacy[1];
}

printf(
	'<div %1$s><span class="screen-reader-text">%2$s</span><div class="wp-block-praxis-callout__content">%3$s</div></div>',
	get_block_wrapper_attributes( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by core.
		array(
			'class' => 'is-type-' . $praxis_callout_type,
			'role'  => 'note',
		)
	),
	/* translators: %s: Callout type, such as "Note" or "Warning". */
	esc_html( sprintf( __( '%s:', 'praxis' ), $praxis_callout_labels[ $praxis_callout_type ] ) ),
	$praxis_callout_content // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Rendered inner blocks.
);
