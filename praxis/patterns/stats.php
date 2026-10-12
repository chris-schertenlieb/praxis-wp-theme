<?php
/**
 * Title: Stats
 * Slug: praxis/stats
 * Categories: praxis-social-proof, about
 * Keywords: stats, numbers, figures, metrics, counters
 * Viewport Width: 1400
 * Description: Four large figures with short labels, separated by thin rules.
 *
 * @package Praxis
 */

$praxis_stats = array(
	array( '100%', __( 'of the site editable in the Site Editor', 'praxis' ) ),
	array( '0', __( 'lines of jQuery on the front end', 'praxis' ) ),
	array( 'AA', __( 'contrast-checked default palette', 'praxis' ) ),
	array( '20+', __( 'patterns to build pages from', 'praxis' ) ),
);
?>
<!-- wp:group {"metadata":{"name":"Stats"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"12rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $praxis_stats as $praxis_stat ) : ?>
		<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|line","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--line);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1","letterSpacing":"-0.04em"}},"fontFamily":"heading","fontSize":"xxx-large"} -->
			<p class="has-heading-font-family has-xxx-large-font-size" style="font-weight:700;letter-spacing:-0.04em;line-height:1"><?php echo esc_html( $praxis_stat[0] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $praxis_stat[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
