<?php
/**
 * Title: Features: image and checklist
 * Slug: praxis/features-media
 * Categories: praxis-features, services, media
 * Keywords: features, image, media, text, checklist, about
 * Viewport Width: 1400
 * Description: An image beside a heading, a paragraph, a checklist of benefits and a button.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Features"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60","top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"52%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( praxis_image_url( 'ui-styles.svg' ) ); ?>" alt="<?php esc_attr_e( 'Four style variation previews in different colors and fonts.', 'praxis' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Make it yours', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Restyle the whole site in minutes', 'praxis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
			<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Pick a style variation, tweak a color or swap a font in Appearance → Editor → Styles. Every template and pattern follows along.', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-praxis-checklist"} -->
			<ul class="wp-block-list is-style-praxis-checklist">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Eight named colors that every block understands', 'praxis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Fluid type that scales smoothly from phone to desktop', 'praxis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Section styles that recolor whole bands of a page', 'praxis' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'about' ) ); ?>"><?php esc_html_e( 'Learn more', 'praxis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
