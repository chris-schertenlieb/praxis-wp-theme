<?php
/**
 * Title: FAQ
 * Slug: praxis/faq
 * Categories: praxis-faq, text
 * Keywords: faq, questions, answers, accordion, details, help
 * Viewport Width: 1400
 * Description: A heading and short intro beside a list of questions that open to show their answers, built with the core Details block.
 *
 * @package Praxis
 */

$praxis_questions = array(
	array( __( 'Do I need to know how to code?', 'praxis' ), __( 'No. Pages, templates, headers, footers, colors and fonts are all edited visually in the Site Editor. Code is there if you want it, never required.', 'praxis' ) ),
	array( __( 'Will it work with my plugins?', 'praxis' ), __( 'Praxis uses standard WordPress blocks and templates, so plugins that support block themes work as expected, including forms, SEO and e-commerce.', 'praxis' ) ),
	array( __( 'Can I change the colors and fonts?', 'praxis' ), __( 'Yes. Pick one of the style variations or set your own colors and fonts in Appearance → Editor → Styles. Every page updates at once.', 'praxis' ) ),
	array( __( 'Is it accessible?', 'praxis' ), __( 'The default palette is checked for WCAG AA contrast, focus styles are always visible, and animations switch off for people who prefer reduced motion.', 'praxis' ) ),
	array( __( 'How do I customise it safely?', 'praxis' ), __( 'Use the included Praxis Child theme for code changes, so updates to Praxis never overwrite your work. Changes made in the Site Editor are kept automatically.', 'praxis' ) ),
);

$praxis_intro = sprintf(
	/* translators: %s: Link to the contact page. */
	esc_html__( 'Can’t find what you’re looking for? %s and we’ll get back to you.', 'praxis' ),
	'<a href="' . esc_url( praxis_pattern_link( 'contact' ) ) . '">' . esc_html__( 'Send us a message', 'praxis' ) . '</a>'
);
?>
<!-- wp:group {"metadata":{"name":"FAQ"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60","top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"38%","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column" style="flex-basis:38%">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'FAQ', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Questions, answered', 'praxis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"muted"} -->
			<p class="has-muted-color has-text-color"><?php echo wp_kses_post( $praxis_intro ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<?php foreach ( $praxis_questions as $praxis_index => $praxis_question ) : ?>
			<!-- wp:details<?php echo 0 === $praxis_index ? ' {"showContent":true}' : ''; ?> -->
			<details class="wp-block-details"<?php echo 0 === $praxis_index ? ' open' : ''; ?>><summary><?php echo esc_html( $praxis_question[0] ); ?></summary>
				<!-- wp:paragraph -->
				<p><?php echo esc_html( $praxis_question[1] ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
