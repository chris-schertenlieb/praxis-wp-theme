# praxis-wp-theme

Open source WordPress block theme. Built entirely on Gutenberg (Full Site Editing) with a set of custom blocks.

## Repository layout

```
praxis/         Parent block theme (templates, theme.json, custom blocks)
praxis-child/   Starter child theme for site-specific customisation
```

## Requirements

- WordPress 6.9+
- PHP 7.4+
- Node.js 20+ (for building custom blocks)

## Getting started

```bash
npm install          # installs root + praxis workspace deps
npm run build        # builds custom blocks into praxis/build/
npm run start        # watch mode while developing blocks
npm run start:js --workspace=praxis  # watch the settings page and editor scripts
npm run lint         # lint block JS + SCSS
composer lint        # lint PHP (after `composer install`)
```

See [CONTRIBUTING.md](CONTRIBUTING.md) for coding standards and the PR workflow.

### Local WordPress

Any local WordPress install works. Point its `wp-content/themes/praxis` and `wp-content/themes/praxis-child` at the two folders in this repo, so edits show up on reload with nothing to copy. With [Lando](https://lando.dev/), from a site that sits next to this repo:

```yaml
# .lando.yml
services:
  appserver:
    overrides:
      volumes:
        - ../praxis-wp-theme/praxis:/app/wp-content/themes/praxis
        - ../praxis-wp-theme/praxis-child:/app/wp-content/themes/praxis-child
```

Run `lando rebuild -y`, then activate **Praxis Child** (or **Praxis**) under Appearance → Themes. Run `npm run build`, or keep `npm run start` running, so custom block changes are compiled.

## Header, footer & sample content

The header and footer are template parts (`praxis/parts/`) that load the `praxis/header` and `praxis/footer` patterns, so they are fully editable in **Appearance → Editor → Patterns → Template Parts**.

### Switching header and footer designs

Praxis ships several designs for each:

| Header | Footer |
|---|---|
| Classic: logo, centered menu, call to action | Dark: call-to-action band with link and social columns |
| Centered: logo and title above the menu | Minimal: one row with title, menu and copyright |
| Minimal: title and a full-screen menu button | Columns: pages, topics and recent posts |

To switch, open a template in **Appearance → Editor**, select the header or footer, and pick a design from the block's sidebar or the **Replace** option in its toolbar. Each design is also a template part (`header-centered`, `footer-columns` and so on), so different templates can use different headers or footers.

To make your own, go to **Appearance → Editor → Patterns → Template Parts → Add new**, choose the Header or Footer area, and build it from blocks. It then appears alongside the built-in designs.

### Page templates

Besides the default templates, pages and posts can pick one of these in the editor's **Template** panel:

- **Page (No Title)**: the default page without its title.
- **Landing (No Header or Footer)**: just the content, for pages that bring their own hero and call to action.
- **Wide**: the content column widens to the theme's wide size.
- **With Sidebar**: content beside a sidebar (search, recent posts, topics). The sidebar is its own template part, so it can be edited in the Site Editor.

The dark footer band is the **Inverse** section style (`praxis/styles/sections/section-inverse.json`). Apply it to any Group, Columns or Cover block from the block's Styles panel, and style variations such as Dark recolor it automatically.

When the theme is activated on an empty site, `praxis/inc/starter-content.php` runs once and creates:

- A **Home** page built from the Landing page pattern, set as the static front page
- **About** and **Contact** pages built from their page patterns, and an empty **Blog** page set as the posts page
- A **Pattern demo** page (linked in the footer menu) that previews the Logo wall and Testimonials patterns with placeholder content, so the real-looking pages don't show made-up logos or quotes
- **Primary** and **Footer** Navigation menus, used by the header and footer
- A sample site tagline, if the site still has the WordPress default

It never runs on a site that already has content, menus or a static front page. All sample posts carry the `_praxis_sample_content` meta key so they can be found and removed later. To turn this off:

```php
add_filter( 'praxis_install_sample_content', '__return_false' );
```

To install it on demand, for example on a development site that isn't empty, use WP-CLI:

```bash
wp praxis starter-content                # same rules as activation
wp praxis starter-content --force --yes  # install anyway, or reset the sample pages
```

`--force` reuses the sample pages and menus if they still exist, resets their content to the theme's current patterns, and makes Home the front page. It doesn't touch anything else.

## Patterns

Praxis ships a pattern library under **Praxis: …** categories in the inserter (each pattern also appears in the matching core category):

| Category | Patterns |
|---|---|
| Heroes | Centered, Aurora (dark, animated glows), Text and image |
| Features | Features grid, Image and checklist, Block showcase (bento grid), Style variations showcase |
| Social proof | Logo wall, Stats, Testimonials |
| Pricing, FAQ, Team, Contact | Pricing table, FAQ (core Accordion block), Team grid, Contact details |
| Calls to action | Banner, Split |
| Posts | Latest posts |
| Pages | Landing, About, Services and pricing, Contact, Pattern demo |

Page patterns appear in the **Choose a pattern** dialog when you add a new page. They're built from the section patterns, so every section can also be inserted on its own. Use them with the **Page (No Title)** template so the page opens with its hero. Images are bundled in `praxis/assets/images/`. The Logo wall and Testimonials patterns ship with obvious placeholders ("LOGO" boxes, "Customer name"); the Team pattern's people are fictional.

### Styles used by the patterns

- **Card** (Group, Column) and **Eyebrow** (Paragraph) block styles, defined as JSON in `praxis/styles/blocks/` so they can be restyled in **Styles → Blocks**.
- **Checklist** block style for the List block.
- Two optional CSS classes, added under **Advanced → Additional CSS class(es)**:
  - `praxis-aurora` on a full-width Group: slowly drifting color glows and a faint grid. Pair it with the Inverse section style.
  - `praxis-reveal` on a section: its contents fade and rise in as they scroll into view. This is pure CSS and only runs in browsers that support scroll-driven animations.

  Both stop moving for visitors who prefer reduced motion.

## Theme settings & block accents

**Appearance → Praxis** (administrators only) holds the theme behaviour that has no home in the Site Editor. Design stays in **Styles**.

### Block accents

With **Add accent colors to core blocks** on (the default), core blocks pick up a palette color in their details:

- quote and pullquote rules, separators, list bullets and numbers, Checklist marks
- table header rules, Details and Accordion toggles, the selected tab
- an edge on Code, Preformatted and Verse blocks, and link underlines in running text
- Icon blocks, the Note callout and the Table of Contents rule

Text colors never change, so readability doesn't depend on the accent. The **Default accent color** on the settings page picks the color (Primary to start). Every supported block also gets an **Accent color** setting in the editor (block settings → Styles) to choose its own palette color. Set it on a Group, Columns or Column and every block inside inherits it. On dark Inverse sections the accent switches to a lighter blend of the palette's Accent color, so it stays visible.

Turn accents off and blocks go back to the theme's plain styling; per-block choices are kept but ignored until you turn accents back on. Block choices are stored only in the block's settings, never in its HTML, so content stays valid if you switch themes.

For developers: everything reads the `--praxis-accent` CSS custom property (`praxis/inc/accents.php`, `praxis/assets/css/accents.css`). Filters: `praxis_block_accents` (bool, on/off) and `praxis_accent_blocks` (the block names that get the setting).

## Custom blocks

Praxis adds blocks only where core falls short, under the **Praxis** inserter category:

| Block | What it does |
|---|---|
| **Callout** | Highlights a Note, Tip, Warning or Success message. Holds any blocks; switch the type from the block card in the sidebar. Each type has its own icon and accent color, and screen readers hear the type ("Warning:") first. Accent colors are `settings.custom.callout` in `theme.json`, so style variations can retune them. |
| **Table of Contents** | Lists the post's headings (H2 down to a level you choose, nested), linking to each one. Shows nothing until the post has two headings to list. |

Heading blocks in post content get an `id` generated from their text (`inc/headings.php`), unless you've set an HTML anchor, so the Table of Contents and shared links can point at them.

Core blocks cover the rest. Accordion, Tabs, Icon and Time to Read (shown in the post meta) are styled to match in `theme.json` and `praxis/assets/css/blocks/`.

Blocks live in `praxis/src/blocks/<block-name>/` and are auto-registered from the compiled `praxis/build/blocks/` directory via a block manifest. Dynamic blocks render with a `render.php` next to their `block.json`. To add a block, create a new folder alongside `callout/` with a `block.json` and rebuild.

## Releasing

`praxis/build/` is git-ignored, so run `npm run build` before zipping the theme for distribution.

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).
