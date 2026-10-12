<?php
/**
 * Title: Post navigation
 * Slug: praxis/post-navigation
 * Inserter: no
 * Description: Links to the previous and next post, used by the single template.
 *
 * @package Praxis
 */

?>
<!-- wp:group {"tagName":"nav","ariaLabel":"<?php echo esc_attr__( 'Posts', 'praxis' ); ?>","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"padding":{"top":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|line","style":"solid","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<nav class="wp-block-group" aria-label="<?php echo esc_attr__( 'Posts', 'praxis' ); ?>" style="border-top-color:var(--wp--preset--color--line);border-top-style:solid;border-top-width:1px;margin-top:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--40)">
	<!-- wp:post-navigation-link {"type":"previous","showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->
	<!-- wp:post-navigation-link {"showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->
</nav>
<!-- /wp:group -->
