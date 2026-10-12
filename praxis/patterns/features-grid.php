<?php
/**
 * Title: Features grid
 * Slug: praxis/features-grid
 * Categories: praxis-features, services
 * Keywords: features, services, grid, cards, benefits
 * Viewport Width: 1400
 * Description: A centered intro above a responsive grid of six numbered feature cards.
 *
 * @package Praxis
 */

$praxis_features = array(
	array( __( 'Full Site Editing', 'praxis' ), __( 'Templates, headers and footers are blocks too. Change any part of the site visually, without touching code.', 'praxis' ) ),
	array( __( 'One design system', 'praxis' ), __( 'Colors, fonts, spacing and shadows live in theme.json, so a change in Styles updates every page at once.', 'praxis' ) ),
	array( __( 'Ready-made patterns', 'praxis' ), __( 'Heroes, pricing, testimonials, FAQs and full pages. Insert one, swap the words, and you are done.', 'praxis' ) ),
	array( __( 'Style variations', 'praxis' ), __( 'Dark, warm and high-contrast looks, plus color and font presets, one click away in the Site Editor.', 'praxis' ) ),
	array( __( 'Accessible by default', 'praxis' ), __( 'Contrast-checked colors, visible focus styles, semantic markup and respect for reduced motion.', 'praxis' ) ),
	array( __( 'Fast and lightweight', 'praxis' ), __( 'Self-hosted fonts, per-block CSS and no jQuery. Pages load only what they actually use.', 'praxis' ) ),
);
?>
<!-- wp:group {"metadata":{"name":"Features"},"align":"full","anchor":"features","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div id="features" class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
		<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Features', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Everything you need, nothing you don’t', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
		<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'A modern block theme that stays out of your way and lets the content lead.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $praxis_features as $praxis_index => $praxis_feature ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"textColor":"primary","fontFamily":"heading","fontSize":"small"} -->
			<p class="has-primary-color has-text-color has-heading-font-family has-small-font-size" style="font-weight:700"><?php echo esc_html( sprintf( '%02d', $praxis_index + 1 ) ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $praxis_feature[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $praxis_feature[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
