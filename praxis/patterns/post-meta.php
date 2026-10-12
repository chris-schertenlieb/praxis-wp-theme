<?php
/**
 * Title: Post meta
 * Slug: praxis/post-meta
 * Inserter: no
 * Description: Publish date and author, used by the post-meta template part.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"textColor":"muted","fontSize":"small","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group has-muted-color has-text-color has-small-font-size">
	<!-- wp:post-date /-->

	<!-- wp:paragraph {"className":"praxis-meta-separator"} -->
	<p class="praxis-meta-separator"><span aria-hidden="true">·</span></p>
	<!-- /wp:paragraph -->

	<!-- wp:post-author-name {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|muted"},":hover":{"color":{"text":"var:preset|color|primary"}}}}}} /-->
</div>
<!-- /wp:group -->
