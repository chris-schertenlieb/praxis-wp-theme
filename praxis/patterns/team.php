<?php
/**
 * Title: Team
 * Slug: praxis/team
 * Categories: praxis-team, team
 * Keywords: team, people, staff, members, about
 * Viewport Width: 1400
 * Description: A heading above a grid of team members, each with a photo, name, role and a short bio.
 *
 * The people are fictional placeholders; swap in your own photos.
 *
 * @package Praxis
 */

$praxis_team = array(
	array( __( 'Maya Okafor', 'praxis' ), __( 'Founder & creative director', 'praxis' ), __( 'Sets the direction and still sketches every logo by hand.', 'praxis' ), 'avatar-1.svg' ),
	array( __( 'Daniel Brooks', 'praxis' ), __( 'Lead developer', 'praxis' ), __( 'Turns designs into fast, accessible blocks and templates.', 'praxis' ), 'avatar-2.svg' ),
	array( __( 'Sofia Lindqvist', 'praxis' ), __( 'Content strategist', 'praxis' ), __( 'Makes sure every page says something worth reading.', 'praxis' ), 'avatar-3.svg' ),
	array( __( 'Arjun Mehta', 'praxis' ), __( 'Product designer', 'praxis' ), __( 'Obsesses over spacing, type and the details in between.', 'praxis' ), 'avatar-4.svg' ),
);
?>
<!-- wp:group {"metadata":{"name":"Team"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
		<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Team', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'The people behind the work', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
		<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'A small, senior team that designs, builds and writes for the web.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"13rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $praxis_team as $praxis_member ) : ?>
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|lg"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<figure class="wp-block-image size-full has-custom-border" style="margin-bottom:var(--wp--preset--spacing--20)"><img src="<?php echo esc_url( praxis_image_url( $praxis_member[3] ) ); ?>" alt="" style="border-radius:var(--wp--preset--border-radius--lg);aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"medium"} -->
			<h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html( $praxis_member[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
			<p class="has-primary-color has-text-color has-small-font-size"><?php echo esc_html( $praxis_member[1] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $praxis_member[2] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
