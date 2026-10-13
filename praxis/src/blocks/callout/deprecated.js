import { createBlock } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

/*
 * v1 (0.1.0): a static block holding a single paragraph in a `content`
 * attribute. Migrates to a Note with that paragraph as its inner block.
 */
const v1 = {
	attributes: {
		content: {
			type: 'string',
			source: 'html',
			selector: 'p',
		},
	},
	supports: {
		html: false,
		align: [ 'wide', 'full' ],
		color: {
			background: true,
			text: true,
		},
		spacing: {
			margin: true,
			padding: true,
		},
	},
	save( { attributes } ) {
		return (
			<div { ...useBlockProps.save() }>
				<RichText.Content tagName="p" value={ attributes.content } />
			</div>
		);
	},
	migrate( { content, ...attributes } ) {
		return [
			{ ...attributes, type: 'note' },
			[ createBlock( 'core/paragraph', { content } ) ],
		];
	},
};

export default [ v1 ];
