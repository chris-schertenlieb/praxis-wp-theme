<?php
/**
 * Title: Dark footer
 * Slug: praxis/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Dark footer with a call-to-action headline, site title and tagline, footer navigation, social links, copyright and a back-to-top link.
 *
 * The dark band is the "Inverse" section style (styles/sections/), so style
 * variations can recolor it. Rules and labels use currentColor mixes rather
 * than palette colors so they read well on any band color.
 *
 * @package Praxis
 */

$praxis_nav_attrs = praxis_navigation_attrs(
	'footer',
	array(
		'overlayMenu' => 'never',
		'layout'      => array(
			'type'        => 'flex',
			'orientation' => 'vertical',
		),
		'style'       => array(
			'spacing' => array( 'blockGap' => 'var:preset|spacing|20' ),
		),
	)
);

$praxis_cta_url = praxis_get_sample_page_url( 'contact' );
?>
<!-- wp:group {"align":"full","className":"is-style-section-inverse","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-inverse" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide" style="padding-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:heading {"level":2,"style":{"typography":{"letterSpacing":"-0.03em","lineHeight":"1.05"},"layout":{"selfStretch":"fixed","flexSize":"min(100%, 14ch)"}},"fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-xx-large-font-size" style="letter-spacing:-0.03em;line-height:1.05"><?php esc_html_e( 'Let’s build something great.', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<?php if ( $praxis_cta_url ) : ?>
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.75em","bottom":"0.75em","left":"1.5em","right":"1.5em"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $praxis_cta_url ); ?>" style="border-radius:999px;padding-top:0.75em;padding-right:1.5em;padding-bottom:0.75em;padding-left:1.5em"><?php esc_html_e( 'Get in touch', 'praxis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"border":{"top":{"color":"color-mix(in srgb, currentColor 20%, transparent)","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide" style="border-top-color:color-mix(in srgb, currentColor 20%, transparent);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","letterSpacing":"-0.02em"}},"fontSize":"large"} /-->
			<!-- wp:site-tagline {"fontSize":"small"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"},"color":{"text":"color-mix(in srgb, currentColor 72%, transparent)"}},"fontSize":"x-small"} -->
			<h2 class="wp-block-heading has-text-color has-x-small-font-size" style="color:color-mix(in srgb, currentColor 72%, transparent);font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Pages', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"},"color":{"text":"color-mix(in srgb, currentColor 72%, transparent)"}},"fontSize":"x-small"} -->
			<h2 class="wp-block-heading has-text-color has-x-small-font-size" style="color:color-mix(in srgb, currentColor 72%, transparent);font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Follow', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:social-links {"iconColorValue":"currentColor","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
			<ul class="wp-block-social-links has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
				<!-- wp:social-link {"url":"https://mastodon.social","service":"mastodon"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"border":{"top":{"color":"color-mix(in srgb, currentColor 20%, transparent)","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="border-top-color:color-mix(in srgb, currentColor 20%, transparent);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php echo esc_html( praxis_copyright_text() ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><a href="#top"><?php esc_html_e( 'Back to top ↑', 'praxis' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
