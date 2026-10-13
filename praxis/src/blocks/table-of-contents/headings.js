import { cleanForSlug } from '@wordpress/url';

/**
 * Returns the plain text of a heading's rich text content.
 *
 * @param {string|Object} content Heading content (a string or RichTextData).
 * @return {string} Plain text.
 */
function toText( content ) {
	const doc = new window.DOMParser().parseFromString(
		String( content ?? '' ),
		'text/html'
	);
	return ( doc.body.textContent || '' ).replace( /\s+/g, ' ' ).trim();
}

/**
 * Collects the Heading blocks in a block list, in document order, with an
 * id for each, the way inc/headings.php does on the front end.
 *
 * @param {Object[]} blocks Blocks from the block editor store.
 * @return {Object[]} Headings with level, text and id.
 */
export function getHeadings( blocks ) {
	const headings = [];
	const walk = ( list ) => {
		for ( const block of list ) {
			if ( block.name === 'core/heading' ) {
				const text = toText( block.attributes.content );
				if ( text ) {
					headings.push( {
						level: block.attributes.level ?? 2,
						text,
						id: block.attributes.anchor || '',
					} );
				}
			}
			walk( block.innerBlocks ?? [] );
		}
	};
	walk( blocks );

	const used = new Set( headings.map( ( h ) => h.id ).filter( Boolean ) );
	for ( const heading of headings ) {
		if ( ! heading.id ) {
			const base = cleanForSlug( heading.text ) || 'section';
			let id = base;
			for ( let n = 2; used.has( id ); n++ ) {
				id = `${ base }-${ n }`;
			}
			used.add( id );
			heading.id = id;
		}
	}

	return headings;
}

/**
 * Nests headings under the closest earlier heading with a lower level.
 *
 * @param {Object[]} headings Flat list from getHeadings().
 * @return {Object[]} Tree of headings, each with a `children` array.
 */
export function nestHeadings( headings ) {
	const root = { level: 1, children: [] };
	const stack = [ root ];

	for ( const heading of headings ) {
		const node = { ...heading, children: [] };
		while (
			stack.length > 1 &&
			stack[ stack.length - 1 ].level >= node.level
		) {
			stack.pop();
		}
		stack[ stack.length - 1 ].children.push( node );
		stack.push( node );
	}

	return root.children;
}
