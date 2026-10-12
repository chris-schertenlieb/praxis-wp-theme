<?php
/**
 * Title: Minimal footer
 * Slug: praxis/footer-minimal
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: A single quiet row with the site title, footer navigation and copyright.
 *
 * @package Praxis
 */

$praxis_nav_attrs = praxis_navigation_attrs(
	'footer',
	array(
		'overlayMenu' => 'never',
		'style'       => array(
			'spacing' => array( 'blockGap' => 'var:preset|spacing|40' ),
		),
		'fontSize'    => 'small',
	)
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|border","style":"solid","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--border);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","letterSpacing":"-0.02em"}},"fontSize":"medium"} /-->

		<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->

		<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
		<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( praxis_copyright_text() ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
