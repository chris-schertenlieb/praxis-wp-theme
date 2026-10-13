<?php
/**
 * Renders the Table of Contents block.
 *
 * Lists the post's Heading blocks from H2 down to the chosen level, nested by
 * level, linking to the ids added by inc/headings.php. Renders nothing when
 * the post has fewer than two headings to list.
 *
 * @package Praxis
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content (empty).
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$praxis_toc_post_id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : get_the_ID();
if ( ! $praxis_toc_post_id || ! function_exists( 'praxis_get_post_headings' ) ) {
	return;
}

$praxis_toc_max_level = min( 6, max( 2, (int) $attributes['maxLevel'] ) );
$praxis_toc_headings  = array_values(
	array_filter(
		praxis_get_post_headings( $praxis_toc_post_id ),
		static function ( $heading ) use ( $praxis_toc_max_level ) {
			return $heading['level'] >= 2 && $heading['level'] <= $praxis_toc_max_level;
		}
	)
);

if ( count( $praxis_toc_headings ) < 2 ) {
	return;
}

$praxis_toc_list  = praxis_toc_list( $praxis_toc_headings, $attributes['ordered'] ? 'ol' : 'ul' );
$praxis_toc_title = '' !== trim( $attributes['title'] ) ? $attributes['title'] : __( 'On this page', 'praxis' );

if ( ! $attributes['showTitle'] ) {
	printf(
		'<nav %1$s>%2$s</nav>',
		get_block_wrapper_attributes( array( 'aria-label' => wp_strip_all_tags( $praxis_toc_title ) ) ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by core.
		$praxis_toc_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in praxis_toc_list().
	);
	return;
}

$praxis_toc_title_id = wp_unique_id( 'praxis-toc-title-' );

printf(
	'<nav %1$s><p class="wp-block-praxis-table-of-contents__title" id="%2$s">%3$s</p>%4$s</nav>',
	get_block_wrapper_attributes( array( 'aria-labelledby' => $praxis_toc_title_id ) ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by core.
	esc_attr( $praxis_toc_title_id ),
	wp_kses( $praxis_toc_title, array() ),
	$praxis_toc_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in praxis_toc_list().
);
