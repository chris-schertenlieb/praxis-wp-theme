<?php
/**
 * Title: About page
 * Slug: praxis/page-about
 * Categories: praxis-pages, about
 * Keywords: about, company, story, team, page
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: An about page with an intro, a story section with an image, stats, the team and a call to action.
 *
 * Use it with the "Page (No Title)" template.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Intro"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
	<p class="is-style-eyebrow"><?php esc_html_e( 'About us', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1"}},"fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1"><?php esc_html_e( 'We design and build for the open web.', 'praxis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
	<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'We are a small studio that believes good websites should be simple to run, quick to load and owned by the people who make them.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"praxis/features-media"} /-->

<!-- wp:pattern {"slug":"praxis/stats"} /-->

<!-- wp:pattern {"slug":"praxis/team"} /-->

<!-- wp:pattern {"slug":"praxis/cta-banner"} /-->
