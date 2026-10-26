# Contributing to Praxis

Thanks for helping out! Praxis is a Full Site Editing theme, so the guiding rule is: **if it can live in the Site Editor, it should.** Prefer `theme.json`, templates, template parts and patterns over PHP-rendered markup, and build new UI as `block.json`-based blocks.

## Setup

Requirements: Node.js 20 (see `.nvmrc`), a local WordPress site, and either PHP 7.4+ with Composer or Docker for PHP linting.

```bash
nvm use              # Node 20
npm install
npm run build        # compile custom blocks into praxis/build/
```

Use `npm run start` to rebuild blocks on save while you work.

To preview changes, mount `praxis/` and `praxis-child/` into a local WordPress site's `wp-content/themes/` so edits show up on reload. See **Local WordPress** in the [README](README.md) for a Lando example.

## Coding standards

The project follows the [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/). `.editorconfig` covers the basics (tabs, LF line endings).

```bash
npm run lint         # JS + SCSS (wp-scripts)
composer install
composer lint        # PHP (WPCS + PHPCompatibilityWP)
composer format      # auto-fix PHP where possible
```

No PHP installed? Run the same commands through the official Composer image:

```bash
docker run --rm -v "$PWD":/app -w /app composer:2 install
docker run --rm -v "$PWD":/app -w /app composer:2 lint
```

- Prefix PHP functions, constants and hooks with `praxis_` (`praxis_child_` in the child theme).
- Make every user-facing string translatable with the `praxis` (or `praxis-child`) text domain. Keep text out of `templates/` and `parts/` (HTML can't be translated): put it in a PHP pattern and reference that instead.
- After changing strings, run `npm run build` and then `composer make-pot` to regenerate `praxis/languages/praxis.pot`. Through Docker, add `-e WP_CLI_ALLOW_ROOT=1` to the `docker run` command. Translators make JSON files for the block editor scripts from their `.po` file with `wp i18n make-json praxis/languages --no-purge`.
- Escape output late (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).

## Where things go

| What | Where |
| --- | --- |
| Design tokens, global styles | `praxis/theme.json`, style variations in `praxis/styles/` |
| Templates / template parts | `praxis/templates/`, `praxis/parts/` |
| Patterns | `praxis/patterns/` (registered from file headers) |
| Custom blocks | `praxis/src/blocks/<name>/` with a `block.json`; auto-registered after `npm run build` |
| Site-specific customisation | `praxis-child/` |

## Pull requests

1. Branch from `main` (`feature/…`, `fix/…`).
2. Keep each PR focused, and make sure `npm run build`, `npm run lint` and `composer lint` pass.
3. Check your change in the Site Editor and on the front end.
4. Add an entry under **Unreleased** in `CHANGELOG.md`.

By contributing, you agree that your contributions are licensed under GPL-2.0-or-later.
