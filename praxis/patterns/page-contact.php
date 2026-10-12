<?php
/**
 * Title: Contact page
 * Slug: praxis/page-contact
 * Categories: praxis-pages, contact
 * Keywords: contact, get in touch, email, phone, page
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A contact page with an intro, contact details, buttons to email or book a call, and an FAQ.
 *
 * Use it with the "Page (No Title)" template.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Intro"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"0"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:0">
	<!-- wp:heading {"level":1,"style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1"}},"fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1"><?php esc_html_e( 'Get in touch', 'praxis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
	<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Whether you have a project in mind or just a question, we would love to hear from you.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"praxis/contact"} /-->

<!-- wp:pattern {"slug":"praxis/faq"} /-->
