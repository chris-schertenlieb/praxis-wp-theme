<?php
/**
 * Title: Call to action: banner
 * Slug: praxis/cta-banner
 * Categories: praxis-cta, call-to-action
 * Keywords: cta, call to action, banner, signup, dark
 * Viewport Width: 1400
 * Description: A rounded, dark banner with drifting color glows, a large headline, a short line of text and two buttons.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Call to action"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","className":"is-style-section-inverse praxis-aurora","style":{"border":{"radius":"var:preset|border-radius|lg"},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignwide is-style-section-inverse praxis-aurora" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
		<!-- wp:heading {"textAlign":"center","style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1.02"}},"fontSize":"xxx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1.02"><?php esc_html_e( 'Ready when you are.', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"color-mix(in srgb, currentColor 78%, transparent)"}},"fontSize":"large"} -->
		<p class="has-text-align-center has-text-color has-large-font-size" style="color:color-mix(in srgb, currentColor 78%, transparent)"><?php esc_html_e( 'Start with a pattern, make it yours, and publish today.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:button {"style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.9em","bottom":"0.9em","left":"1.75em","right":"1.75em"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'contact' ) ); ?>" style="border-radius:999px;padding-top:0.9em;padding-right:1.75em;padding-bottom:0.9em;padding-left:1.75em"><?php esc_html_e( 'Get in touch', 'praxis' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.9em","bottom":"0.9em","left":"1.75em","right":"1.75em"}}}} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'about' ) ); ?>" style="border-radius:999px;padding-top:0.9em;padding-right:1.75em;padding-bottom:0.9em;padding-left:1.75em"><?php esc_html_e( 'Learn more', 'praxis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
