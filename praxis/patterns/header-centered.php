<?php
/**
 * Title: Centered header
 * Slug: praxis/header-centered
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Sticky header with the logo and site title centered above the primary navigation.
 *
 * On small screens the title and menu button sit side by side (see the
 * .praxis-header-centered rule in assets/css/theme.css).
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
?>
<!-- wp:group {"align":"full","className":"is-style-praxis-sticky","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-praxis-sticky has-contrast-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","className":"praxis-header-centered","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide praxis-header-centered">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":40,"shouldSyncIcon":true} /-->
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","letterSpacing":"-0.02em"}},"fontSize":"large"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
