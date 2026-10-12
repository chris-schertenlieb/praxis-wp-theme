<?php
/**
 * Title: Minimal header
 * Slug: praxis/header-minimal
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Sticky header with just the site title and a menu button that opens the full-screen navigation on every screen size.
 *
 * @package Praxis
 */

$praxis_nav_attrs = praxis_navigation_attrs(
	'primary',
	array(
		'overlayMenu' => 'always',
		'icon'        => 'menu',
	)
);
?>
<!-- wp:group {"align":"full","className":"is-style-praxis-sticky","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-praxis-sticky has-contrast-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","letterSpacing":"-0.02em"}},"fontSize":"medium"} /-->

		<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
