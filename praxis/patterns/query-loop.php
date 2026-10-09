<?php
/**
 * Title: Query Loop
 * Slug: praxis/query-loop
 * Inserter: no
 * Description: Post list used by the index, archive and search templates.
 *
 * @package Praxis
 */

?>
<!-- wp:query {"query":{"inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:post-template -->
		<!-- wp:post-title {"isLink":true} /-->
		<!-- wp:post-date {"fontSize":"small"} /-->
		<!-- wp:post-excerpt /-->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Nothing found.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
