<?php
/**
 * Title: Classic header
 * Slug: praxis/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Sticky, translucent header with the site logo and title, centered primary navigation and a pill call to action.
 *
 * The Navigation block points at the sample "Primary" menu created on
 * activation (see inc/starter-content.php). Without it, core falls back to
 * the most recent menu or a page list.
 *
 * Stickiness comes from the "Sticky header" block style on the outer group,
 * so it can be turned off in the Site Editor.
 *
 * @package Praxis
 */

$praxis_nav_attrs = praxis_navigation_attrs(
	'primary',
	array(
		'overlayMenu' => 'mobile',
		'layout'      => array(
			'type'           => 'flex',
			'justifyContent' => 'center',
		),
		'style'       => array(
			'spacing' => array( 'blockGap' => 'var:preset|spacing|40' ),
		),
		'fontSize'    => 'small',
	)
);

$praxis_cta_url = praxis_get_sample_page_url( 'contact' );
?>
<!-- wp:group {"align":"full","className":"is-style-praxis-sticky","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-praxis-sticky has-contrast-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":36,"shouldSyncIcon":true} /-->
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","letterSpacing":"-0.02em","textDecoration":"none"}},"fontSize":"medium"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->

		<?php if ( $praxis_cta_url ) : ?>
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"small","style":{"border":{"radius":"999px"},"spacing":{"padding":{"top":"0.6em","bottom":"0.6em","left":"1.25em","right":"1.25em"}}}} -->
			<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $praxis_cta_url ); ?>" style="border-radius:999px;padding-top:0.6em;padding-right:1.25em;padding-bottom:0.6em;padding-left:1.25em"><?php esc_html_e( 'Get in touch', 'praxis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
