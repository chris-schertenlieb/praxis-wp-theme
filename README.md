# praxis-wp-theme

Open source WordPress block theme. Built entirely on Gutenberg (Full Site Editing) with a set of custom blocks.

## Repository layout

```
praxis/         Parent block theme (templates, theme.json, custom blocks)
praxis-child/   Starter child theme for site-specific customisation
```

## Requirements

- WordPress 6.8+
- PHP 7.4+
- Node.js 20+ (for building custom blocks)

## Getting started

```bash
npm install          # installs root + praxis workspace deps
npm run build        # builds custom blocks into praxis/build/
npm run start        # watch mode while developing blocks
```

### Local WordPress (optional)

Uses [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) (requires Docker):

```bash
npm run env:start    # http://localhost:8888  (admin / password)
```

Both themes are mounted automatically; activate **Praxis Child** (or **Praxis**) under Appearance → Themes.

## Header, footer & sample content

The header and footer are template parts (`praxis/parts/`) that load the `praxis/header` and `praxis/footer` patterns, so they are fully editable in **Appearance → Editor → Patterns → Template Parts**.

When the theme is activated on an empty site, `praxis/inc/starter-content.php` runs once and creates:

- **About** and **Contact** sample pages
- **Primary** and **Footer** Navigation menus, used by the header and footer
- A sample site tagline, if the site still has the WordPress default

All sample posts carry the `_praxis_sample_content` meta key so they can be found and removed later. To turn this off:

```php
add_filter( 'praxis_install_sample_content', '__return_false' );
```

## Custom blocks

Blocks live in `praxis/src/blocks/<block-name>/` and are auto-registered from the compiled `praxis/build/blocks/` directory via a block manifest. To add a block, create a new folder alongside `callout/` with a `block.json` and rebuild.

## Releasing

`praxis/build/` is git-ignored, so run `npm run build` before zipping the theme for distribution.

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).
