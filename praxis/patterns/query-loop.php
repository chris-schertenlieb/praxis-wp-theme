<?php
/**
 * Title: Query Loop
 * Slug: praxis/query-loop
 * Inserter: no
 * Description: Responsive grid of post cards, used by the index, home and archive templates.
 *
 * @package Praxis
 */

?>
<!-- wp:query {"query":{"inherit":true},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->
			<!-- wp:post-date /-->
			<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"large"} /-->
			<!-- wp:post-excerpt {"excerptLength":24,"textColor":"muted","fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'There are no posts here yet.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
