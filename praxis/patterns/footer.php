<?php
/**
 * Title: Footer
 * Slug: praxis/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Site title and tagline, footer navigation, social links and copyright.
 *
 * The Navigation block points at the sample "Footer" menu created on
 * activation (see inc/starter-content.php).
 *
 * @package Praxis
 */

$praxis_nav_attrs = array(
	'overlayMenu' => 'never',
	'layout'      => array(
		'type'        => 'flex',
		'orientation' => 'vertical',
	),
);

$praxis_nav_id = praxis_get_sample_navigation_id( 'footer' );
if ( $praxis_nav_id ) {
	$praxis_nav_attrs = array( 'ref' => $praxis_nav_id ) + $praxis_nav_attrs;
}

$praxis_copyright = sprintf(
	/* translators: 1: Current year, 2: Site name. */
	__( '© %1$s %2$s. Built with Praxis.', 'praxis' ),
	gmdate( 'Y' ),
	get_bloginfo( 'name' )
);
?>
<!-- wp:group {"align":"full","backgroundColor":"secondary","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:site-title {"level":0} /-->
			<!-- wp:site-tagline {"textColor":"muted","fontSize":"small"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"medium"} -->
			<h2 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Pages', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:navigation <?php echo wp_json_encode( $praxis_nav_attrs ); ?> /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"medium"} -->
			<h2 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Follow', 'praxis' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:social-links {"className":"is-style-logos-only"} -->
			<ul class="wp-block-social-links is-style-logos-only">
				<!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"https://github.com","service":"github"} /-->
				<!-- wp:social-link {"url":"https://mastodon.social","service":"mastodon"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:separator -->
		<hr class="wp-block-separator has-alpha-channel-opacity"/>
		<!-- /wp:separator -->

		<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
		<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $praxis_copyright ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
