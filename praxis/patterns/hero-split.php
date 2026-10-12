<?php
/**
 * Title: Hero: text and image
 * Slug: praxis/hero-split
 * Categories: praxis-hero, banner
 * Keywords: hero, banner, split, image, columns
 * Viewport Width: 1400
 * Description: A two-column hero with a headline, supporting text, a short checklist and buttons beside an image.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60","top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"46%","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Design without the busywork', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"style":{"typography":{"letterSpacing":"-0.04em","lineHeight":"1"}},"fontSize":"xxx-large"} -->
			<h1 class="wp-block-heading has-xxx-large-font-size" style="letter-spacing:-0.04em;line-height:1"><?php esc_html_e( 'Your site, your rules.', 'praxis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
			<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Change colors, fonts and layouts from one place and watch every page follow. Patterns get you started; the Site Editor takes it from there.', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-praxis-checklist"} -->
			<ul class="wp-block-list is-style-praxis-checklist">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Edit everything visually, no code needed', 'praxis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Switch the whole look with one click', 'praxis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Fast, accessible and translation-ready', 'praxis' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'contact' ) ); ?>"><?php esc_html_e( 'Get started', 'praxis' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( praxis_pattern_link( 'about' ) ); ?>"><?php esc_html_e( 'See how it works', 'praxis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( praxis_image_url( 'ui-editor.svg' ) ); ?>" alt="<?php esc_attr_e( 'Illustration of the Site Editor with a page built from blocks.', 'praxis' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
