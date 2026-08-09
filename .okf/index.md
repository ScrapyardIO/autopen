---
okf_version: "0.2"
---

# scrapyard-io/autopen Knowledge Bundle

Package knowledge for `scrapyard-io/autopen` (ScrapyardIO extended fonts companion, v0.7.0).
Read this index first; open only the concepts needed for the task.

**Trust rule:** Prefer `status: stable`. Treat `deprecated` as historical only. New agent-written concepts stay `status: draft` until a human verifies them.
**Placement:** This bundle lives at the **autopen package root** only — never under `src/`.
**Links:** Concept cross-links use paths relative to each file.
**Scope:** Document what exists on disk in this 0.7 tree. Do **not** invent 0.6 `fabricate/fonts` APIs or claim fonts live in tubes core beyond the GFXFont / FontManager registry.
**Dist note:** `.okf/` and root `AGENTS.md` are `export-ignore` in `.gitattributes` so Composer dist packages do not ship this bundle.

# Orientation

Section index: [orientation/](orientation/index.md)

* [Package (0.7)](orientation/package.md) - Composer identity, namespace, 58-font library surface. (`draft`)
* [Ownership vs tubes](orientation/ownership-vs-tubes.md) - Autopen owns font *data*; tubes owns GFXFont / FontManager / Font MagicAlias. (`draft`)

# Core

Section index: [core/](core/index.md)

* [AutopenServiceProvider](core/autopen-service-provider.md) - Merges config, publishes, registers enabled fonts via `Font::extend`. (`draft`)
* [Font config](core/font-config.md) - `config/fonts.php` merged as `autopen-fonts`; 58 entries; default-enabled trio. (`draft`)
* [Font library](core/font-library.md) - Families under `src/`; 58 GFXFont classes; Unifont16 empty bitmaps. (`draft`)

# Conventions

Section index: [conventions/](conventions/index.md)

* [Companion package](conventions/companion-package.md) - Opt-in fonts companion; depends on tubes, not `fabricate/fonts`. (`draft`)
