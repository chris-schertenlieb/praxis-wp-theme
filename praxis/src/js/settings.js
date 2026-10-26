/**
 * Appearance → Praxis: the theme settings page (inc/settings.php).
 *
 * Reads and saves the `praxis_settings` option through the core
 * /wp/v2/settings endpoint.
 */
import apiFetch from '@wordpress/api-fetch';
import {
	BaseControl,
	Button,
	Card,
	CardBody,
	CardHeader,
	ColorPalette,
	Notice,
	Spinner,
	ToggleControl,
} from '@wordpress/components';
import { createRoot, useEffect, useState } from '@wordpress/element';
import { __, sprintf } from '@wordpress/i18n';

const { palette = [], defaults = {} } = window.praxisSettingsPage || {};

function SettingsPage() {
	const [ settings, setSettings ] = useState( null );
	const [ isSaving, setIsSaving ] = useState( false );
	const [ notice, setNotice ] = useState( null );

	useEffect( () => {
		apiFetch( { path: '/wp/v2/settings' } )
			.then( ( response ) =>
				setSettings( { ...defaults, ...response.praxis_settings } )
			)
			.catch( ( error ) =>
				setNotice( { status: 'error', message: error.message } )
			);
	}, [] );

	if ( ! settings ) {
		return notice ? (
			<Notice status={ notice.status } isDismissible={ false }>
				{ notice.message }
			</Notice>
		) : (
			<Spinner />
		);
	}

	const update = ( changes ) => setSettings( { ...settings, ...changes } );
	const accent = palette.find(
		( color ) => color.slug === settings.accentColor
	);

	const save = () => {
		setIsSaving( true );
		setNotice( null );
		apiFetch( {
			path: '/wp/v2/settings',
			method: 'POST',
			data: { praxis_settings: settings },
		} )
			.then( ( response ) => {
				setSettings( { ...defaults, ...response.praxis_settings } );
				setNotice( {
					status: 'success',
					message: __( 'Settings saved.', 'praxis' ),
				} );
			} )
			.catch( ( error ) =>
				setNotice( { status: 'error', message: error.message } )
			)
			.finally( () => setIsSaving( false ) );
	};

	return (
		<div style={ { maxWidth: '40rem', marginTop: '1rem' } }>
			{ notice && (
				<div style={ { marginBottom: '1rem' } }>
					<Notice
						status={ notice.status }
						onRemove={ () => setNotice( null ) }
					>
						{ notice.message }
					</Notice>
				</div>
			) }

			<Card>
				<CardHeader>
					<h2 style={ { margin: 0, fontSize: '1.1em' } }>
						{ __( 'Block accents', 'praxis' ) }
					</h2>
				</CardHeader>
				<CardBody>
					<ToggleControl
						__nextHasNoMarginBottom
						label={ __(
							'Add accent colors to core blocks',
							'praxis'
						) }
						help={ __(
							'Quote and pullquote rules, separators, list markers, table header rules, accordion and details toggles, the selected tab, code edges and link underlines take a palette color. Text colors don’t change. Each block can pick its own accent in its Styles settings.',
							'praxis'
						) }
						checked={ !! settings.blockAccents }
						onChange={ ( blockAccents ) =>
							update( { blockAccents } )
						}
					/>

					{ settings.blockAccents && (
						<div style={ { marginTop: '1.5rem' } }>
							<BaseControl
								__nextHasNoMarginBottom
								id="praxis-accent-color"
								label={ __( 'Default accent color', 'praxis' ) }
								help={
									accent
										? sprintf(
												/* translators: %s: Palette color name. */
												__(
													'Blocks use %s unless they pick their own accent.',
													'praxis'
												),
												accent.name
										  )
										: __(
												'Pick a palette color.',
												'praxis'
										  )
								}
							>
								<ColorPalette
									colors={ palette }
									value={ accent?.color }
									disableCustomColors
									clearable={ false }
									onChange={ ( color ) => {
										const match = palette.find(
											( entry ) => entry.color === color
										);
										if ( match ) {
											update( {
												accentColor: match.slug,
											} );
										}
									} }
								/>
							</BaseControl>
						</div>
					) }
				</CardBody>
			</Card>

			<div style={ { marginTop: '1rem' } }>
				<Button
					variant="primary"
					onClick={ save }
					isBusy={ isSaving }
					disabled={ isSaving }
				>
					{ __( 'Save changes', 'praxis' ) }
				</Button>
			</div>
		</div>
	);
}

const root = document.getElementById( 'praxis-settings' );

if ( root ) {
	createRoot( root ).render( <SettingsPage /> );
}
