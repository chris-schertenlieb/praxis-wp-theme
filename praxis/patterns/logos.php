<?php
/**
 * Title: Logo wall
 * Slug: praxis/logos
 * Categories: praxis-social-proof, about
 * Keywords: logos, clients, partners, brands, trusted by
 * Viewport Width: 1400
 * Description: A short line of text above a row of client or partner logos.
 *
 * The bundled logos are fictional placeholders. Replace each image with
 * your own; SVG or transparent PNG logos around 40px tall work best.
 *
 * @package Praxis
 */

$praxis_logos = array(
	'orbital'   => 'Orbital',
	'kestrel'   => 'Kestrel',
	'fieldnote' => 'Fieldnote',
	'halcyon'   => 'Halcyon',
	'mosaic'    => 'Mosaic',
	'lumen'     => 'Lumen',
);
?>
<!-- wp:group {"metadata":{"name":"Logos"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
	<p class="has-text-align-center has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Trusted by teams who care about their craft', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $praxis_logos as $praxis_file => $praxis_name ) : ?>
		<!-- wp:image {"height":"32px","sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( praxis_image_url( 'logo-' . $praxis_file . '.svg' ) ); ?>" alt="<?php echo esc_attr( $praxis_name ); ?>" style="height:32px"/></figure>
		<!-- /wp:image -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
