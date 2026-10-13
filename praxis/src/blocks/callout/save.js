import { InnerBlocks } from '@wordpress/block-editor';

/*
 * Only the inner blocks are saved. render.php adds the wrapper, the type
 * label for screen readers and the icon, so they can change without
 * invalidating saved content.
 */
export default function save() {
	return <InnerBlocks.Content />;
}
