<?php
/**
 * Title: Header
 * Slug: praxis/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site logo, title, primary navigation and a call to action.
 *
 * The Navigation block points at the sample "Primary" menu created on
 * activation (see inc/starter-content.php). Without it, core falls back to
 * the most recent menu or a page list.
 *
 * @package Praxis
 */

$praxis_nav_attrs = array(
	'overlayMenu' => 'mobile',
	'layout'      => array(
		'type'           => 'flex',
		'justifyContent' => 'right',
	),
);

$praxis_nav_id = praxis_get_sample_navigation_id( 'primary' );
if ( $praxis_nav_id ) {
	$praxis_nav_attrs = array( 'ref' => $praxis_nav_id ) + $praxis_nav_attrs;
}

$praxis_cta_url = praxis_get_sample_page_url( 'contact' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":40,"shouldSyncIcon":true} /-->
			<!-- wp:site-title {"level":0} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->

			<?php if ( $praxis_cta_url ) : ?>
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $praxis_cta_url ); ?>"><?php esc_html_e( 'Get in touch', 'praxis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
			<?php endif; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
