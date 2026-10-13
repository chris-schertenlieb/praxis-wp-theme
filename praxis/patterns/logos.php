<?php
/**
 * Title: Logo wall
 * Slug: praxis/logos
 * Categories: praxis-social-proof, about
 * Keywords: logos, clients, partners, brands, trusted by
 * Viewport Width: 1400
 * Description: A short line of text above a row of client or partner logos.
 *
 * The images are "LOGO" placeholders. Replace each one with a real logo;
 * SVG or transparent PNG logos around 40px tall work best.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Logos"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
	<p class="has-text-align-center has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Add the logos of your clients or partners here', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<?php for ( $praxis_i = 0; $praxis_i < 6; $praxis_i++ ) : ?>
		<!-- wp:image {"height":"40px","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( praxis_image_url( 'logo-placeholder.svg' ) ); ?>" alt="<?php esc_attr_e( 'Logo placeholder', 'praxis' ); ?>" style="height:40px"/></figure>
		<!-- /wp:image -->
		<?php endfor; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
