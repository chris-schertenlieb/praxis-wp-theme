<?php
/**
 * Title: 404
 * Slug: praxis/404
 * Inserter: no
 * Description: Content for the 404 template.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"}},"textColor":"primary","fontSize":"small"} -->
	<p class="has-primary-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Error 404', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-xxx-large-font-size"><?php esc_html_e( 'Page not found', 'praxis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
	<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'The page you were looking for has moved or no longer exists. Try a search, or head back home.', 'praxis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'praxis' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search this site…', 'praxis' ); ?>","buttonText":"<?php echo esc_attr__( 'Search', 'praxis' ); ?>"} /-->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'praxis' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
