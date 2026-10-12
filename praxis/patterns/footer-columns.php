<?php
/**
 * Title: Columns footer
 * Slug: praxis/footer-columns
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Light footer with the site title, tagline and social links, plus columns for pages, topics and recent posts.
 *
 * The Topics and Recent posts columns are core Categories and Latest Posts
 * blocks, so they stay up to date on their own.
 *
 * @package Praxis
 */

$praxis_nav_attrs = praxis_navigation_attrs(
	'footer',
	array(
		'overlayMenu' => 'never',
		'layout'      => array(
			'type'        => 'flex',
			'orientation' => 'vertical',
		),
		'style'       => array(
			'spacing' => array( 'blockGap' => 'var:preset|spacing|20' ),
		),
		'fontSize'    => 'small',
	)
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:column {"width":"34%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700","letterSpacing":"-0.02em"}},"fontSize":"large"} /-->
			<!-- wp:site-tagline {"textColor":"muted","fontSize":"small"} /-->
			<!-- wp:social-links {"iconColorValue":"currentColor","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
			<ul class="wp-block-social-links has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
				<!-- wp:social-link {"url":"https://mastodon.social","service":"mastodon"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"}},"textColor":"muted","fontSize":"x-small"} -->
			<h2 class="wp-block-heading has-muted-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Pages', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"}},"textColor":"muted","fontSize":"x-small"} -->
			<h2 class="wp-block-heading has-muted-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Topics', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:categories {"className":"praxis-plain-list","fontSize":"small"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"}},"textColor":"muted","fontSize":"x-small"} -->
			<h2 class="wp-block-heading has-muted-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Recent posts', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:latest-posts {"postsToShow":3,"className":"praxis-plain-list","fontSize":"small"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"border":{"top":{"color":"var:preset|color|line","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--line);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
		<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( praxis_copyright_text() ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><a href="#top"><?php esc_html_e( 'Back to top ↑', 'praxis' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
