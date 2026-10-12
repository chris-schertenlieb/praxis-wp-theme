<?php
/**
 * Title: Block showcase (bento grid)
 * Slug: praxis/showcase-bento
 * Categories: praxis-features, featured
 * Keywords: bento, grid, showcase, blocks, cards, features
 * Viewport Width: 1400
 * Description: A bento-style grid of cards showing off blocks: a callout, buttons, type, a quote, code and an accordion.
 *
 * Cards span one or two grid columns and fall back to a single column on
 * narrow screens.
 *
 * @package Praxis
 */

$praxis_code = implode(
	"\n",
	array(
		'"settings": {',
		'  "color": {',
		'    "palette": [',
		'      { "slug": "primary",',
		'        "color": "#003d3d" }',
		'    ]',
		'  }',
		'}',
	)
);
?>
<!-- wp:group {"metadata":{"name":"Block showcase"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|60"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
		<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Blocks', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Every block, styled with care', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
		<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Core blocks and Praxis blocks share one design language, so whatever you add already fits.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"is-style-card","style":{"layout":{"columnSpan":2,"rowSpan":1},"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Praxis block', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Callouts for the things that matter', 'praxis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:praxis/callout -->
			<div class="wp-block-praxis-callout"><p><?php esc_html_e( 'Tip: every color here comes from the palette, so switching style variations recolors this card too.', 'praxis' ); ?></p></div>
			<!-- /wp:praxis/callout -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Buttons', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Clear calls to action', 'praxis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Primary', 'praxis' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Outline', 'praxis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Typography', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1","letterSpacing":"-0.04em"}},"fontFamily":"heading","fontSize":"xxx-large"} -->
			<p class="has-heading-font-family has-xxx-large-font-size" style="font-weight:700;letter-spacing:-0.04em;line-height:1">Aa</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Fluid type that scales smoothly between phone and desktop, in self-hosted fonts.', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card","style":{"layout":{"columnSpan":2,"rowSpan":1},"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Quote', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:quote -->
			<blockquote class="wp-block-quote">
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Good design is as little design as possible. Less, but better, because it concentrates on the essential aspects.', 'praxis' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><?php esc_html_e( 'Dieter Rams', 'praxis' ); ?></cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card","style":{"layout":{"columnSpan":2,"rowSpan":1},"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Code', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Your design system, in one file', 'praxis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:code -->
			<pre class="wp-block-code"><code><?php echo esc_html( $praxis_code ); ?></code></pre>
			<!-- /wp:code -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:paragraph {"className":"is-style-eyebrow","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<p class="is-style-eyebrow" style="margin-bottom:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Details', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:details {"fontSize":"medium"} -->
			<details class="wp-block-details has-medium-font-size"><summary><?php esc_html_e( 'Is it really all blocks?', 'praxis' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Yes. Headers, footers, templates and this very card.', 'praxis' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"fontSize":"medium"} -->
			<details class="wp-block-details has-medium-font-size"><summary><?php esc_html_e( 'Does it need a page builder?', 'praxis' ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'No. Everything is built into WordPress.', 'praxis' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
