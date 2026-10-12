<?php
/**
 * Title: Services and pricing page
 * Slug: praxis/page-services
 * Categories: praxis-pages, services
 * Keywords: services, pricing, plans, offer, page
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A services page with an intro, a features grid, pricing plans, an FAQ and a call to action.
 *
 * Use it with the "Page (No Title)" template.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Intro"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
	<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Services', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1"}},"fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1"><?php esc_html_e( 'Plans for every stage', 'praxis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
	<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'From a first portfolio to a busy client roster, pick the support that fits and upgrade when you need to.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"praxis/features-grid"} /-->

<!-- wp:pattern {"slug":"praxis/pricing"} /-->

<!-- wp:pattern {"slug":"praxis/faq"} /-->

<!-- wp:pattern {"slug":"praxis/cta-split"} /-->
