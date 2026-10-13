import { __ } from '@wordpress/i18n';
import { caution, check, info, tip } from '@wordpress/icons';

/*
 * One variation per callout type, so each shows up in the inserter and can be
 * switched from the block card in the sidebar. The front end gets the same
 * labels from render.php, for screen readers.
 */
const variations = [
	{
		name: 'note',
		title: __( 'Note', 'praxis' ),
		description: __( 'Add context or a side note.', 'praxis' ),
		icon: info,
		attributes: { type: 'note' },
		isDefault: true,
	},
	{
		name: 'tip',
		title: __( 'Tip', 'praxis' ),
		description: __(
			'Share a shortcut or a helpful suggestion.',
			'praxis'
		),
		icon: tip,
		attributes: { type: 'tip' },
	},
	{
		name: 'warning',
		title: __( 'Warning', 'praxis' ),
		description: __(
			'Point out a risk or something to watch for.',
			'praxis'
		),
		icon: caution,
		attributes: { type: 'warning' },
	},
	{
		name: 'success',
		title: __( 'Success', 'praxis' ),
		description: __(
			'Confirm that something worked or is done.',
			'praxis'
		),
		icon: check,
		attributes: { type: 'success' },
	},
].map( ( variation ) => ( {
	...variation,
	scope: [ 'inserter', 'transform' ],
	isActive: [ 'type' ],
} ) );

export default variations;
