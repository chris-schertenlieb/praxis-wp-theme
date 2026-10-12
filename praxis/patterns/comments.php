<?php
/**
 * Title: Comments
 * Slug: praxis/comments
 * Inserter: no
 * Description: Comment list and form, used by the comments template part.
 *
 * @package Praxis
 */

?>
<!-- wp:comments {"className":"praxis-comments","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-comments praxis-comments" style="margin-top:var(--wp--preset--spacing--60)">
	<!-- wp:comments-title {"level":2,"fontSize":"large"} /-->

	<!-- wp:comment-template -->
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"},"border":{"bottom":{"color":"var:preset|color|line","style":"solid","width":"1px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--line);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:avatar {"size":40,"style":{"border":{"radius":"999px"}}} /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:comment-author-name {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} /-->
					<!-- wp:comment-date {"textColor":"muted","fontSize":"x-small"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:comment-content /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"fontSize":"small","layout":{"type":"flex"}} -->
			<div class="wp-block-group has-small-font-size">
				<!-- wp:comment-reply-link /-->
				<!-- wp:comment-edit-link /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	<!-- /wp:comment-template -->

	<!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:comments-pagination-previous /-->
		<!-- wp:comments-pagination-numbers /-->
		<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->

	<!-- wp:post-comments-form {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} /-->
</div>
<!-- /wp:comments -->
