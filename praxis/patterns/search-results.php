<?php
/**
 * Title: Search results
 * Slug: praxis/search-results
 * Inserter: no
 * Description: Compact list of search results with an empty state, used by the search template.
 *
 * @package Praxis
 */

?>
<!-- wp:query {"query":{"inherit":true},"layout":{"type":"default"}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"0"}}} -->
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"},"border":{"bottom":{"color":"var:preset|color|border","style":"solid","width":"1px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"large"} /-->
			<!-- wp:post-excerpt {"excerptLength":32,"textColor":"muted","fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'No results matched your search. Try different or fewer keywords.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
