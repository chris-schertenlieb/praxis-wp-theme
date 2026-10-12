<?php
/**
 * Title: Hero: aurora
 * Slug: praxis/hero-aurora
 * Categories: praxis-hero, banner
 * Keywords: hero, banner, gradient, animated, dark, landing
 * Viewport Width: 1400
 * Description: A dark, full-width hero with slowly drifting color glows, a display headline, two buttons and a product illustration.
 *
 * The background comes from the Inverse section style plus the
 * `praxis-aurora` class (assets/css/blocks/core-group.css). The glows stop
 * moving for visitors who prefer reduced motion.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","className":"is-style-section-inverse praxis-aurora","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull is-style-section-inverse praxis-aurora" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"border":{"radius":"999px","width":"1px","style":"solid","color":"color-mix(in srgb, currentColor 28%, transparent)"},"spacing":{"padding":{"top":"0.4em","bottom":"0.4em","left":"1.1em","right":"1.1em"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group has-border-color" style="border-color:color-mix(in srgb, currentColor 28%, transparent);border-style:solid;border-width:1px;border-radius:999px;padding-top:0.4em;padding-right:1.1em;padding-bottom:0.4em;padding-left:1.1em">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"fontSize":"x-small"} -->
			<p class="has-x-small-font-size" style="font-weight:500"><?php esc_html_e( '✦ Free, open source and built for the Site Editor', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"letterSpacing":"-0.045em","lineHeight":"0.98","fontWeight":"700"}},"fontSize":"xxx-large"} -->
		<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size" style="font-weight:700;letter-spacing:-0.045em;line-height:0.98"><?php esc_html_e( 'Build beautiful sites, block by block.', 'praxis' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"color-mix(in srgb, currentColor 78%, transparent)"}},"fontSize":"large"} -->
		<p class="has-text-align-center has-text-color has-large-font-size" style="color:color-mix(in srgb, currentColor 78%, transparent)"><?php esc_html_e( 'Praxis gives you polished templates, dozens of patterns and a design system you control from Styles. No page builder, no lock-in, just WordPress.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:button {"style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.9em","bottom":"0.9em","left":"1.75em","right":"1.75em"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#features" style="border-radius:999px;padding-top:0.9em;padding-right:1.75em;padding-bottom:0.9em;padding-left:1.75em"><?php esc_html_e( 'Explore the theme', 'praxis' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.9em","bottom":"0.9em","left":"1.75em","right":"1.75em"}}}} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'contact' ) ); ?>" style="border-radius:999px;padding-top:0.9em;padding-right:1.75em;padding-bottom:0.9em;padding-left:1.75em"><?php esc_html_e( 'Get in touch', 'praxis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:image {"align":"wide","sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image alignwide size-full"><img src="<?php echo esc_url( praxis_image_url( 'ui-editor.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of the Site Editor with a page built from blocks.', 'praxis' ); ?>"/></figure>
	<!-- /wp:image -->
</div>
<!-- /wp:group -->
