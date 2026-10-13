import { __, sprintf } from '@wordpress/i18n';
import {
	InspectorControls,
	RichText,
	useBlockProps,
	store as blockEditorStore,
} from '@wordpress/block-editor';
import {
	PanelBody,
	Placeholder,
	SelectControl,
	ToggleControl,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { tableOfContents } from '@wordpress/icons';

import { getHeadings, nestHeadings } from './headings';

function List( { items, ordered } ) {
	const Tag = ordered ? 'ol' : 'ul';
	return (
		<Tag className="wp-block-praxis-table-of-contents__list">
			{ items.map( ( item ) => (
				<li key={ item.id }>
					<a
						href={ `#${ item.id }` }
						onClick={ ( event ) => event.preventDefault() }
					>
						{ item.text }
					</a>
					{ item.children.length > 0 && (
						<List items={ item.children } ordered={ ordered } />
					) }
				</li>
			) ) }
		</Tag>
	);
}

// Shown in the inserter preview, which has no page to read headings from.
const SAMPLE_HEADINGS = [
	{ level: 2, text: __( 'Getting started', 'praxis' ), id: 'a' },
	{ level: 3, text: __( 'Install the theme', 'praxis' ), id: 'b' },
	{ level: 3, text: __( 'Pick a style', 'praxis' ), id: 'c' },
	{ level: 2, text: __( 'Building pages', 'praxis' ), id: 'd' },
];

export default function Edit( { attributes, setAttributes } ) {
	const { title, showTitle, maxLevel, ordered } = attributes;
	const { blocks, isPreview } = useSelect( ( select ) => {
		const { getBlocks, getSettings } = select( blockEditorStore );
		return {
			blocks: getBlocks(),
			isPreview: getSettings().isPreviewMode,
		};
	}, [] );
	const headings = (
		isPreview ? SAMPLE_HEADINGS : getHeadings( blocks )
	).filter( ( heading ) => heading.level >= 2 && heading.level <= maxLevel );
	const blockProps = useBlockProps();

	const controls = (
		<InspectorControls>
			<PanelBody title={ __( 'Settings', 'praxis' ) }>
				<SelectControl
					__next40pxDefaultSize
					__nextHasNoMarginBottom
					label={ __( 'Include headings down to', 'praxis' ) }
					value={ maxLevel }
					options={ [ 2, 3, 4, 5, 6 ].map( ( level ) => ( {
						/* translators: %d: Heading level, from 2 to 6. */
						label: sprintf( __( 'Heading %d', 'praxis' ), level ),
						value: level,
					} ) ) }
					onChange={ ( value ) =>
						setAttributes( { maxLevel: Number( value ) } )
					}
				/>
				<ToggleControl
					__nextHasNoMarginBottom
					label={ __( 'Show title', 'praxis' ) }
					checked={ showTitle }
					onChange={ ( value ) =>
						setAttributes( { showTitle: value } )
					}
				/>
				<ToggleControl
					__nextHasNoMarginBottom
					label={ __( 'Numbered list', 'praxis' ) }
					checked={ ordered }
					onChange={ ( value ) =>
						setAttributes( { ordered: value } )
					}
				/>
			</PanelBody>
		</InspectorControls>
	);

	if ( headings.length < 2 ) {
		return (
			<div { ...blockProps }>
				{ controls }
				<Placeholder
					icon={ tableOfContents }
					label={ __( 'Table of Contents', 'praxis' ) }
					instructions={ __(
						'Lists the headings on this page. It shows up once the page has at least two headings to list.',
						'praxis'
					) }
				/>
			</div>
		);
	}

	return (
		<nav { ...blockProps }>
			{ controls }
			{ showTitle && (
				<RichText
					tagName="p"
					className="wp-block-praxis-table-of-contents__title"
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					placeholder={ __( 'On this page', 'praxis' ) }
					allowedFormats={ [] }
					disableLineBreaks
				/>
			) }
			<List items={ nestHeadings( headings ) } ordered={ ordered } />
		</nav>
	);
}
