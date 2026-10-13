# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Pattern library under "Praxis: …" inserter categories: Aurora, Centered and Text-and-image heroes; Features grid, Image and checklist, Block showcase (bento grid) and Style variations showcase; Logo wall, Stats and Testimonials; Pricing table; FAQ; Team; Contact details; Banner and Split calls to action; and Latest posts.
- Page patterns (Landing, About, Services and pricing, Contact, Pattern demo) offered when creating a new page, built from the section patterns.
- Starter content now creates a Home page from the Landing page pattern and sets it as the static front page, builds About and Contact from their page patterns, and adds a Blog page as the posts page and a Pattern demo page that previews the Logo wall and Testimonials patterns with placeholder content. It still only runs on empty sites.
- `wp praxis starter-content [--force]` WP-CLI command to install the starter content on demand, or reset the sample pages and menus.
- Block styles: Card (Group, Column) and Eyebrow (Paragraph) as JSON style variations in `styles/blocks/`, and Checklist for the List block.
- `praxis-aurora` (animated glows behind a section) and `praxis-reveal` (fade in on scroll) CSS classes. Both are CSS only and respect reduced motion.
- Details block styling: dividers between items and a plus/cross toggle.
- Table of Contents block (`praxis/table-of-contents`): lists the post's headings, nested, from H2 down to a chosen level, with an optional title and numbered list. Dynamic, so it always matches the post.
- Heading blocks in post content get an `id` generated from their text, unless they have an HTML anchor, so they can be linked to.
- Styling for the core Accordion, Tabs and Icon blocks, to match the Details block and the palette.
- Core Time to Read in the post meta, after the date and author.
- In-page links scroll headings clear of the sticky header.
- Bundled, CC0 illustrations, avatars and logo placeholders in `assets/images/`.
- PHP coding standards tooling (`composer.json`, `phpcs.xml.dist`) using WordPress Coding Standards and PHPCompatibilityWP.
- `CONTRIBUTING.md` and this changelog.
- Committed `package-lock.json` and `composer.lock`.
- Design system in `theme.json`: an 8-color palette (deep teal `#003d3d` primary, lime accent) checked for WCAG AA contrast, a 7-step fluid type scale, a 7-step spacing scale, radius and shadow presets, and styles for buttons, quotes, pullquotes, tables, code, images, captions, separators, navigation, post titles and site titles.
- Self-hosted, OFL-licensed variable fonts in `assets/fonts/` (latin + latin-ext): Space Grotesk and Inter by default, plus Bricolage Grotesque, Figtree, Fraunces and Instrument Sans for the style variations.
- Style variations: Dark, High contrast and Warm, plus color presets (Indigo, Terracotta) and typography presets (Signal, Editorial).
- Per-block stylesheets for core blocks in `assets/css/blocks/core-<block>.css`, loaded only when the block is on the page.
- `home.html` template for the blog index, with a "Latest posts" heading.
- `post-meta` and `comments` template parts, editable in the Site Editor.
- "Pills" block style for Post Terms, used for tags on single posts.
- Previous/next post navigation on single posts.
- Switchable header and footer designs, each a pattern (pick it under Replace in the Site Editor) and a template part: Centered and Minimal headers, Minimal and Columns footers, alongside the existing Classic header and Dark footer.
- "Inverse" section style (`styles/sections/section-inverse.json`) for Group, Columns, Column and Cover blocks.
- Custom templates: Landing (no header or footer), Wide, and With Sidebar, plus a `sidebar` template part with search, recent posts and topics.

### Changed

- Callout block: now holds any blocks instead of a single paragraph, and comes in Note, Tip, Warning and Success types, each with an icon, accent color and a label for screen readers. It's rendered on the server, adds border, typography and shadow settings, and callouts saved by 0.1 are migrated when opened in the editor (until then they still display correctly).
- The FAQ pattern uses the core Accordion block instead of Details.
- Requires WordPress 6.9 (for the core Accordion and Time to Read blocks); tested up to 7.1.
- Single, page and "Page (No Title)" templates: post content is now full width with its own constrained layout, so wide and full-width blocks inside a post break out of the text column.
- Single posts: category label above the title, date and author meta, wide 16:9 featured image, and comments with avatars. Comments fill whatever column they're in, so they line up in the Wide and With Sidebar templates.
- Blog, archive and index templates show posts as a responsive card grid; archives get a header with the term description.
- Search shows a compact results list with an empty-state message; the 404 page gets a larger heading, search and a link home.
- The dark footer uses the Inverse section style instead of fixed palette colors. The Dark variation recolors it, so its footer is no longer a light band with near-invisible labels.
- Redesigned header: sticky, frosted-glass bar with bold site title, centered navigation with an animated underline, a pill "Get in touch" button, and a large-type mobile menu. Stickiness is a "Sticky header" group block style, so it can be switched off in the Site Editor.
- Redesigned footer: dark band with a call-to-action headline, link and social columns, and a bottom bar with copyright and a back-to-top link.
- Buttons get a hover/focus color in `theme.json`.
- Font family presets now use role slugs (`heading`, `body`, `monospace`) instead of `system-sans`/`system-mono`, so variations can swap fonts without touching block styles.
- `theme.css` uses `theme.json` custom tokens for transitions instead of hardcoded values.
- `npm run lint:css` also checks `assets/css/`.

### Fixed

- The "Border" palette color (slug `border`) generated a `.has-border-color` text-color class that clashes with the class core adds to any block with a custom border color, so those blocks got pale text. The slug is now `line` ("Line"). Sites that used `var(--wp--preset--color--border)` in custom CSS need to switch to `--line`.
- Outline buttons on Inverse sections were nearly invisible; they now follow the section's text color.
- Warm variation: buttons on Inverse sections used dark text on a dark green background. They now use the primary color.
- The header's "Get in touch" button and the post meta separator saved markup the editor had to migrate on load ("block contains unexpected content" risk).
- No strip of background between the header and a page that opens with a full-width section, or between a closing full-width section and the footer.
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
