<?php
/**
 * Title: Testimonials
 * Slug: praxis/testimonials
 * Categories: praxis-social-proof, testimonials
 * Keywords: testimonials, reviews, quotes, customers, social proof
 * Viewport Width: 1400
 * Description: A heading above three testimonial cards, each with a quote and the person's photo, name and role.
 *
 * Ships with placeholder quotes, names and photos. Replace them with real
 * testimonials, with permission.
 *
 * @package Praxis
 */

$praxis_testimonials = array(
	__( 'Sample testimonial. Replace this with a short quote from a customer about the result you delivered for them.', 'praxis' ),
	__( 'Another placeholder quote. Two or three sentences work best: specific, in the customer’s own words.', 'praxis' ),
	__( 'A third sample quote. Ask before publishing a real customer’s name, photo and words.', 'praxis' ),
);
?>
<!-- wp:group {"metadata":{"name":"Testimonials"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
		<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Testimonials', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'What our customers say', 'praxis' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $praxis_testimonials as $praxis_quote ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"fontSize":"medium"} -->
			<p class="has-medium-font-size"><?php echo esc_html( '“' . $praxis_quote . '”' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"48px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"999px"}}} -->
				<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url( praxis_image_url( 'avatar-placeholder.svg' ) ); ?>" alt="" style="border-radius:999px;width:48px;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="font-weight:600"><?php esc_html_e( 'Customer name', 'praxis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"muted","fontSize":"x-small"} -->
					<p class="has-muted-color has-text-color has-x-small-font-size"><?php esc_html_e( 'Job title, Company', 'praxis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
