<?php
/**
 * Title: Style variations showcase
 * Slug: praxis/style-variations
 * Categories: praxis-features, featured
 * Keywords: styles, variations, colors, palette, themes, dark mode
 * Viewport Width: 1400
 * Description: A preview card for each of the theme's style variations, drawn in that variation's own colors.
 *
 * The cards are generated from the palettes in theme.json and styles/, so
 * they stay in sync with the variations the theme actually ships. Once
 * inserted they're ordinary groups with fixed colors.
 *
 * @package Praxis
 */

$praxis_swatches = array( 'primary', 'accent', 'secondary', 'contrast' );
?>
<!-- wp:group {"metadata":{"name":"Style variations"},"align":"full","className":"praxis-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull praxis-reveal" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
		<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Style variations', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'One theme, many looks', 'praxis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"large"} -->
		<p class="has-text-align-center has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'Switch the whole site’s palette in Appearance → Editor → Styles. Your content stays exactly where it is.', 'praxis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"15rem"}} -->
	<div class="wp-block-group alignwide">
		<?php
		foreach ( praxis_style_variation_palettes() as $praxis_variation ) :
			$praxis_colors = $praxis_variation['colors'];
			$praxis_card   = array(
				'style'  => array(
					'color'   => array(
						'background' => $praxis_colors['base'],
						'text'       => $praxis_colors['contrast'],
					),
					'border'  => array(
						'color'  => $praxis_colors['line'],
						'radius' => '16px',
						'style'  => 'solid',
						'width'  => '1px',
					),
					'spacing' => array(
						'padding'  => array(
							'top'    => 'var:preset|spacing|40',
							'right'  => 'var:preset|spacing|40',
							'bottom' => 'var:preset|spacing|40',
							'left'   => 'var:preset|spacing|40',
						),
						'blockGap' => 'var:preset|spacing|30',
					),
				),
				'layout' => array(
					'type'           => 'flex',
					'orientation'    => 'vertical',
					'justifyContent' => 'stretch',
				),
			);
			?>
		<!-- wp:group <?php echo wp_json_encode( $praxis_card ); ?> -->
		<div class="wp-block-group has-border-color has-text-color has-background" style="border-color:<?php echo esc_attr( $praxis_colors['line'] ); ?>;border-style:solid;border-width:1px;border-radius:16px;color:<?php echo esc_attr( $praxis_colors['contrast'] ); ?>;background-color:<?php echo esc_attr( $praxis_colors['base'] ); ?>;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<?php
				foreach ( $praxis_swatches as $praxis_slug ) :
					$praxis_swatch = array(
						'style'  => array(
							'color'      => array( 'background' => $praxis_colors[ $praxis_slug ] ),
							'border'     => array(
								'radius' => '8px',
								'color'  => $praxis_colors['line'],
								'style'  => 'solid',
								'width'  => '1px',
							),
							'spacing'    => array(
								'padding' => array(
									'top'    => '0',
									'right'  => '0',
									'bottom' => '0',
									'left'   => '0',
								),
							),
							'dimensions' => array( 'minHeight' => '2.75rem' ),
							'layout'     => array(
								'selfStretch' => 'fill',
								'flexSize'    => null,
							),
						),
						'layout' => array( 'type' => 'default' ),
					);
					?>
				<!-- wp:group <?php echo wp_json_encode( $praxis_swatch ); ?> -->
				<div class="wp-block-group has-border-color has-background" style="border-color:<?php echo esc_attr( $praxis_colors['line'] ); ?>;border-style:solid;border-width:1px;border-radius:8px;background-color:<?php echo esc_attr( $praxis_colors[ $praxis_slug ] ); ?>;min-height:2.75rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"></div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontFamily":"heading","fontSize":"large"} -->
			<p class="has-heading-font-family has-large-font-size" style="font-weight:600"><?php echo esc_html( $praxis_variation['title'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
