/**
 * Block accents: an "Accent color" control for supported blocks.
 *
 * The choice is saved as the `praxisAccent` attribute (a palette slug) in
 * the block comment only. inc/accents.php applies it when the block
 * renders, and here it's applied to the block in the editor canvas, so the
 * saved markup never changes. Loaded only while accents are on.
 */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls, useSettings } from '@wordpress/block-editor';
import { ColorPalette, PanelBody } from '@wordpress/components';
import { __, sprintf } from '@wordpress/i18n';

const { blocks = [], defaultAccent = 'primary' } = window.praxisAccents || {};

const isSupported = ( name ) => blocks.includes( name );

const accentValue = ( slug ) =>
	`var(--wp--preset--color--${ slug }, var(--wp--preset--color--primary))`;

addFilter(
	'blocks.registerBlockType',
	'praxis/accent/attribute',
	( settings, name ) => {
		if ( ! isSupported( name ) ) {
			return settings;
		}

		return {
			...settings,
			attributes: {
				...settings.attributes,
				praxisAccent: { type: 'string' },
			},
		};
	}
);

/**
 * Returns the theme palette as a flat list, whatever shape the setting has.
 *
 * @param {Array|Object} palette The `color.palette` setting.
 * @return {Array} Palette entries with slug, name and color.
 */
function flattenPalette( palette ) {
	if ( Array.isArray( palette ) ) {
		return palette;
	}

	return [ ...( palette?.theme ?? [] ), ...( palette?.custom ?? [] ) ];
}

function AccentPanel( { name, attributes, setAttributes } ) {
	const [ palette ] = useSettings( 'color.palette' );
	const colors = flattenPalette( palette );
	const current = colors.find(
		( color ) => color.slug === attributes.praxisAccent
	);
	const fallback = colors.find( ( color ) => color.slug === defaultAccent );
	const isContainer = [
		'core/group',
		'core/columns',
		'core/column',
	].includes( name );

	let help = current
		? sprintf(
				/* translators: %s: Palette color name. */
				__(
					'This block uses %s. Clear it to use the site default.',
					'praxis'
				),
				current.name
		  )
		: sprintf(
				/* translators: %s: Palette color name. */
				__(
					'Using the site default (%s). Pick a color to give this block its own accent.',
					'praxis'
				),
				fallback?.name ?? defaultAccent
		  );

	if ( isContainer ) {
		help +=
			' ' +
			__(
				'Blocks inside inherit it unless they pick their own.',
				'praxis'
			);
	}

	return (
		<PanelBody
			title={ __( 'Accent color', 'praxis' ) }
			initialOpen={ !! attributes.praxisAccent }
		>
			<ColorPalette
				colors={ colors }
				value={ current?.color }
				disableCustomColors
				clearable
				onChange={ ( color ) => {
					const match = colors.find(
						( entry ) => entry.color === color
					);
					setAttributes( { praxisAccent: match?.slug } );
				} }
			/>
			<p className="components-base-control__help">{ help }</p>
		</PanelBody>
	);
}

const withAccentControl = createHigherOrderComponent(
	( BlockEdit ) => ( props ) => {
		if ( ! props.isSelected || ! isSupported( props.name ) ) {
			return <BlockEdit { ...props } />;
		}

		return (
			<>
				<BlockEdit { ...props } />
				<InspectorControls group="styles">
					<AccentPanel { ...props } />
				</InspectorControls>
			</>
		);
	},
	'withPraxisAccentControl'
);

addFilter( 'editor.BlockEdit', 'praxis/accent/control', withAccentControl );

const withAccentStyle = createHigherOrderComponent(
	( BlockListBlock ) => ( props ) => {
		const slug = props.attributes?.praxisAccent;

		if ( ! slug || ! isSupported( props.name ) ) {
			return <BlockListBlock { ...props } />;
		}

		const wrapperProps = {
			...props.wrapperProps,
			style: {
				...props.wrapperProps?.style,
				'--praxis-accent': accentValue( slug ),
			},
		};

		return (
			<BlockListBlock
				{ ...props }
				className={ [ props.className, 'has-praxis-accent' ]
					.filter( Boolean )
					.join( ' ' ) }
				wrapperProps={ wrapperProps }
			/>
		);
	},
	'withPraxisAccentStyle'
);

addFilter( 'editor.BlockListBlock', 'praxis/accent/style', withAccentStyle );
