<?php
/**
 * Title: Testimonials
 * Slug: praxis/testimonials
 * Categories: praxis-social-proof, testimonials
 * Keywords: testimonials, reviews, quotes, customers, social proof
 * Viewport Width: 1400
 * Description: A heading above three testimonial cards, each with a rating, a quote and the person's photo, name and role.
 *
 * The people and companies are fictional placeholders.
 *
 * @package Praxis
 */

$praxis_testimonials = array(
	array(
		'quote'  => __( 'We rebuilt our studio site in an afternoon. The patterns did the heavy lifting, and our designer tuned the rest in Styles without asking a developer.', 'praxis' ),
		'name'   => __( 'Maya Okafor', 'praxis' ),
		'role'   => __( 'Founder, Fieldnote Studio', 'praxis' ),
		'avatar' => 'avatar-1.svg',
	),
	array(
		'quote'  => __( 'Finally a theme that feels like WordPress and not a plugin pretending to be one. Clean markup, no lock-in and it is fast out of the box.', 'praxis' ),
		'name'   => __( 'Daniel Brooks', 'praxis' ),
		'role'   => __( 'Lead developer, Orbital', 'praxis' ),
		'avatar' => 'avatar-2.svg',
	),
	array(
		'quote'  => __( 'Our editors love that the page they edit is the page they get. Switching to the dark variation for our evening edition took one click.', 'praxis' ),
		'name'   => __( 'Sofia Lindqvist', 'praxis' ),
		'role'   => __( 'Managing editor, Halcyon', 'praxis' ),
		'avatar' => 'avatar-3.svg',
	),
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
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Loved by people who build for the web', 'praxis' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $praxis_testimonials as $praxis_testimonial ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.15em"}},"textColor":"primary"} -->
			<p class="has-primary-color has-text-color" style="letter-spacing:0.15em"><span class="screen-reader-text"><?php esc_html_e( 'Rated 5 out of 5', 'praxis' ); ?></span><span aria-hidden="true">★★★★★</span></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"fontSize":"medium"} -->
			<p class="has-medium-font-size"><?php echo esc_html( '“' . $praxis_testimonial['quote'] . '”' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"48px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"999px"}}} -->
				<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url( praxis_image_url( $praxis_testimonial['avatar'] ) ); ?>" alt="" style="border-radius:999px;width:48px;height:auto"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="font-weight:600"><?php echo esc_html( $praxis_testimonial['name'] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"muted","fontSize":"x-small"} -->
					<p class="has-muted-color has-text-color has-x-small-font-size"><?php echo esc_html( $praxis_testimonial['role'] ); ?></p>
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
