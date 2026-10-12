<?php
/**
 * Title: Contact details
 * Slug: praxis/contact
 * Categories: praxis-contact, contact
 * Keywords: contact, email, phone, address, get in touch
 * Viewport Width: 1400
 * Description: A heading and intro with email, phone and office details, beside a card with buttons to email or book a call.
 *
 * Core has no form block. To add a form, insert one from a forms plugin in
 * place of the card on the right.
 *
 * @package Praxis
 */

$praxis_email = 'hello@example.com';

$praxis_details = array(
	array( __( 'Email', 'praxis' ), '<a href="mailto:' . esc_attr( $praxis_email ) . '">' . esc_html( $praxis_email ) . '</a>' ),
	array( __( 'Phone', 'praxis' ), esc_html__( '+1 (555) 010-0100', 'praxis' ) ),
	array( __( 'Office', 'praxis' ), esc_html__( '123 Example Street, Suite 4, Springfield', 'praxis' ) ),
	array( __( 'Hours', 'praxis' ), esc_html__( 'Monday to Friday, 9am–5pm', 'praxis' ) ),
);
?>
<!-- wp:group {"metadata":{"name":"Contact"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60","top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
			<p class="is-style-eyebrow"><?php esc_html_e( 'Contact', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Talk to a real person', 'praxis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"muted","fontSize":"large"} -->
			<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Questions about a project, a plan or the theme itself? We usually reply within one working day.', 'praxis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
				<?php foreach ( $praxis_details as $praxis_detail ) : ?>
				<!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|line","style":"solid","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--line);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="font-weight:600"><?php echo esc_html( $praxis_detail[0] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
					<p class="has-muted-color has-text-color has-small-font-size"><?php echo wp_kses_post( $praxis_detail[1] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Prefer to talk it through?', 'praxis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
				<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Book a free 20-minute call. Tell us what you are working on and we will tell you honestly whether we can help.', 'praxis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--20)">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Book a call', 'praxis' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( 'mailto:' . $praxis_email ); ?>"><?php esc_html_e( 'Email us', 'praxis' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
