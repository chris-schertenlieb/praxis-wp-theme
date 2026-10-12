<?php
/**
 * Title: Sidebar
 * Slug: praxis/sidebar
 * Inserter: no
 * Description: Search, recent posts and topics, used by the sidebar template part.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"tagName":"aside","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<aside class="wp-block-group">
	<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'praxis' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search…', 'praxis' ); ?>","buttonText":"<?php echo esc_attr__( 'Search', 'praxis' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"}},"textColor":"muted","fontSize":"x-small"} -->
		<h2 class="wp-block-heading has-muted-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Recent posts', 'praxis' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:latest-posts {"postsToShow":4,"displayPostDate":true,"className":"praxis-plain-list","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontWeight":"600"}},"textColor":"muted","fontSize":"x-small"} -->
		<h2 class="wp-block-heading has-muted-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Topics', 'praxis' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:categories {"showPostCounts":true,"className":"praxis-plain-list","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->
</aside>
<!-- /wp:group -->
