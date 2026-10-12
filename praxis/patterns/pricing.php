<?php
/**
 * Title: Pricing table
 * Slug: praxis/pricing
 * Categories: praxis-pricing, services
 * Keywords: pricing, plans, tiers, table, subscription
 * Viewport Width: 1400
 * Description: Three pricing plans side by side, with the middle plan highlighted, each with a price, a feature checklist and a button.
 *
 * The highlighted plan uses the Inverse section style, so it follows the
 * active style variation.
 *
 * @package Praxis
 */

$praxis_plans = array(
	array(
		'name'     => __( 'Starter', 'praxis' ),
		'price'    => __( '$0', 'praxis' ),
		'period'   => __( 'free forever', 'praxis' ),
		'summary'  => __( 'For personal sites and side projects.', 'praxis' ),
		'features' => array( __( 'Every template and pattern', 'praxis' ), __( 'All style variations', 'praxis' ), __( 'Community support', 'praxis' ) ),
		'button'   => __( 'Get started', 'praxis' ),
		'featured' => false,
	),
	array(
		'name'     => __( 'Studio', 'praxis' ),
		'price'    => __( '$19', 'praxis' ),
		'period'   => __( 'per month', 'praxis' ),
		'summary'  => __( 'For small teams that ship often.', 'praxis' ),
		'features' => array( __( 'Everything in Starter', 'praxis' ), __( 'Priority email support', 'praxis' ), __( 'Design review each quarter', 'praxis' ), __( 'Custom style variation', 'praxis' ) ),
		'button'   => __( 'Choose Studio', 'praxis' ),
		'featured' => true,
	),
	array(
		'name'     => __( 'Agency', 'praxis' ),
		'price'    => __( '$49', 'praxis' ),
		'period'   => __( 'per month', 'praxis' ),
		'summary'  => __( 'For agencies running many client sites.', 'praxis' ),
		'features' => array( __( 'Everything in Studio', 'praxis' ), __( 'Unlimited client sites', 'praxis' ), __( 'Onboarding call', 'praxis' ) ),
		'button'   => __( 'Talk to us', 'praxis' ),
		'featured' => false,
	),
);
?>
<!-- wp:group {"metadata":{"name":"Pricing"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
		<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Pricing', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Simple plans that grow with you', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
		<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'No setup fees. Change or cancel your plan at any time.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40","top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $praxis_plans as $praxis_plan ) : ?>
			<?php if ( $praxis_plan['featured'] ) : ?>
		<!-- wp:column {"className":"is-style-section-inverse","style":{"border":{"radius":"var:preset|border-radius|lg"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column is-style-section-inverse" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<?php else : ?>
		<!-- wp:column {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column is-style-card">
			<?php endif; ?>
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $praxis_plan['name'] ); ?></h3>
				<!-- /wp:heading -->
				<?php if ( $praxis_plan['featured'] ) : ?>

				<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
				<p class="is-style-eyebrow"><?php esc_html_e( 'Most popular', 'praxis' ); ?></p>
				<!-- /wp:paragraph -->
				<?php endif; ?>
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1","letterSpacing":"-0.04em"}},"fontFamily":"heading","fontSize":"xx-large"} -->
				<p class="has-heading-font-family has-xx-large-font-size" style="font-weight:700;letter-spacing:-0.04em;line-height:1"><?php echo esc_html( $praxis_plan['price'] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php echo esc_html( $praxis_plan['period'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php echo esc_html( $praxis_plan['summary'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-praxis-checklist","fontSize":"small"} -->
			<ul class="wp-block-list is-style-praxis-checklist has-small-font-size">
				<?php foreach ( $praxis_plan['features'] as $praxis_feature ) : ?>
				<!-- wp:list-item -->
				<li><?php echo esc_html( $praxis_feature ); ?></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<?php if ( $praxis_plan['featured'] ) : ?>
				<!-- wp:button {"style":{"dimensions":{"width":"100%"}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'contact' ) ); ?>"><?php echo esc_html( $praxis_plan['button'] ); ?></a></div>
				<!-- /wp:button -->
				<?php else : ?>
				<!-- wp:button {"className":"is-style-outline","style":{"dimensions":{"width":"100%"}}} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'contact' ) ); ?>"><?php echo esc_html( $praxis_plan['button'] ); ?></a></div>
				<!-- /wp:button -->
				<?php endif; ?>
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
