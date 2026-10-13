import { registerBlockType } from '@wordpress/blocks';
import { tableOfContents } from '@wordpress/icons';

import './style.scss';
import './editor.scss';

import Edit from './edit';
import metadata from './block.json';

registerBlockType( metadata.name, {
	icon: tableOfContents,
	edit: Edit,
} );
