import { __ } from '@wordpress/i18n';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

const TEMPLATE = [
	[
		'core/paragraph',
		{ placeholder: __( 'Write your callout…', 'praxis' ) },
	],
];

export default function Edit( { attributes } ) {
	const blockProps = useBlockProps( {
		className: `is-type-${ attributes.type }`,
	} );
	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'wp-block-praxis-callout__content' },
		{ template: TEMPLATE }
	);

	return (
		<div { ...blockProps }>
			<div { ...innerBlocksProps } />
		</div>
	);
}
