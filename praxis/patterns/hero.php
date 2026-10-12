<?php
/**
 * Title: Hero: centered
 * Slug: praxis/hero
 * Categories: praxis-hero, banner
 * Keywords: hero, banner, header, intro
 * Viewport Width: 1400
 * Description: A full-width hero with an eyebrow, a large centered headline, supporting text and two buttons on a soft gradient.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|40"}},"gradient":"secondary-to-base","layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull has-secondary-to-base-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
	<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'A block theme for the Site Editor', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1"}},"fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1"><?php esc_html_e( 'Build something worth sharing', 'praxis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
	<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Start from a pattern, make it yours in Styles, and publish. Every part of this page is a block you can edit.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'contact' ) ); ?>"><?php esc_html_e( 'Get started', 'praxis' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'about' ) ); ?>"><?php esc_html_e( 'Learn more', 'praxis' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
