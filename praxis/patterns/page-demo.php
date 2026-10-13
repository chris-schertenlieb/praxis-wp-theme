<?php
/**
 * Title: Pattern demo page
 * Slug: praxis/page-demo
 * Categories: praxis-pages
 * Keywords: demo, sample, patterns, placeholder, showcase, page
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A demo page that previews the Logo wall and Testimonials patterns with placeholder content.
 *
 * These patterns only make sense with real logos and quotes, so they're
 * kept off the sample Home and About pages and shown here instead.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Intro"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
	<p class="is-style-eyebrow"><?php esc_html_e( 'Demo', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1"}},"fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1"><?php esc_html_e( 'Pattern demo', 'praxis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
	<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'A preview of patterns that need your own content before they go on a real page. Insert them from the block inserter under Patterns → Praxis: Social proof.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:praxis/callout {"type":"warning"} -->
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Everything below is placeholder content. The logos, names and quotes are not real.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- /wp:praxis/callout -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"praxis/logos"} /-->

<!-- wp:pattern {"slug":"praxis/testimonials"} /-->
