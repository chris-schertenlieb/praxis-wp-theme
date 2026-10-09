# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- PHP coding standards tooling (`composer.json`, `phpcs.xml.dist`) using WordPress Coding Standards and PHPCompatibilityWP.
- `CONTRIBUTING.md` and this changelog.
- Committed `package-lock.json` and `composer.lock`.

### Changed

- Redesigned header: sticky, frosted-glass bar with bold site title, centered navigation with an animated underline, a pill "Get in touch" button, and a large-type mobile menu. Stickiness is a "Sticky header" group block style, so it can be switched off in the Site Editor.
- Redesigned footer: dark band with a call-to-action headline, link and social columns, and a bottom bar with copyright and a back-to-top link.
- Buttons get a hover/focus color in `theme.json`.

### Fixed

- Stray separator line in the footer.
- Footer no longer stops partway up the screen on short pages.

### Removed

- `@wordpress/env` (`.wp-env.json`, `env:start`/`env:stop` scripts). Preview the themes by mounting them into any local WordPress site; the README has a Lando example.

### Fixed

- Pinned TypeScript to 5.x so `npm run lint` works; TypeScript 7 is incompatible with the ESLint setup in `@wordpress/scripts`.

## [0.1.0]

### Added

- Praxis parent block theme: `theme.json`, templates, header/footer template parts, patterns and starter content.
- `praxis/callout` custom block.
- Praxis Child starter theme.
- npm workspace with `@wordpress/scripts` build and `@wordpress/env` local environment.

[Unreleased]: https://github.com/chris-schertenlieb/praxis-wp-theme/compare/v0.1.0...HEAD
[0.1.0]: https://github.com/chris-schertenlieb/praxis-wp-theme/releases/tag/v0.1.0
