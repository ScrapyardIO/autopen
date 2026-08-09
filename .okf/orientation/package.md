---
type: Orientation
title: Package (0.7)
description: scrapyard-io/autopen 0.7.0 — ScrapyardIO extended fonts companion; 58 GFXFont classes registered into tubes FontManager.
resource: .
tags: [orientation, autopen, fonts, scrapyard-io, 0.7]
generated: { by: okf-documentation-generator/cursor, at: "2026-08-09T20:18:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Package name, version, PHP, autoload, scrapyard-io providers
  - id: provider
    resource: src/AutopenServiceProvider.php
    title: AutopenServiceProvider
  - id: config
    resource: config/fonts.php
    title: Font registry config (58 entries)
  - id: test
    resource: tests/Unit/FontLibraryTest.php
    title: Pest library count and GFXFont coverage
---

# What it is

Composer package `scrapyard-io/autopen` at **0.7.0** — “The ScrapyardIO Extended Fonts package.”[^composer] It is an **opt-in companion** to `scrapyard-io/tubes` ^0.7 that ships bitmap font *data* classes and registers enabled ones into tubes’ `Font` MagicAlias.[^provider]

Homepage points at the [ecosystem docs](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x).[^composer]

| Field | Value |
|-------|-------|
| Name | `scrapyard-io/autopen` |
| Version | `0.7.0` |
| PHP | `^8.4\|^8.5\|^8.6`[^composer] |
| Namespace | `ScrapyardIO\Fonts\` → `src/`[^composer] |
| Discovery | `extra.scrapyard-io.providers` → `ScrapyardIO\Fonts\AutopenServiceProvider`[^composer] |
| Requires | `scrapyard-io/tubes` `^0.7.0`[^composer] |
| Role | Extended fonts companion (font data packs) |

# Surface (on disk)

| Path | State |
|------|-------|
| `src/AutopenServiceProvider.php` | Merges `autopen-fonts`, publishes, `Font::extend` for enabled entries[^provider] |
| `config/fonts.php` | 58 slug → `{ class, enabled }` entries; three enabled by default[^config] |
| `src/{FreeMono,FreeSans,FreeSerif,HelvB,Logisoso,Montserrat,OneOffs,U8g2,Unscii}/` | 58 `GFXFont` subclasses[^test] |
| `tests/Unit/FontLibraryTest.php` | Expects 58 fonts; autoload + range + bitmap-offset checks[^test] |
| `tools/` | Optional BDF/Adafruit → PHP converters (see `tools/README.md`) |

Do **not** invent 0.6 `fabricate/fonts` APIs or claim this package owns `GFXFont` / `FontManager` (those live in tubes).

# What it is not

- Not part of slim `scrapyard-io/framework` 0.7 core.
- Not a replacement for tubes’ font registry — it *plugs into* it.
- Not `fabricate/fonts` (legacy / do not revive under that name for 0.7).

# Related

| Topic | Concept |
|-------|---------|
| Boundary | [Ownership vs tubes](ownership-vs-tubes.md) |
| Boot | [AutopenServiceProvider](../core/autopen-service-provider.md) |
| Catalog | [Font library](../core/font-library.md) |
| Convention | [Companion package](../conventions/companion-package.md) |

[^composer]: Package name, version, PHP, autoload, scrapyard-io providers
[^provider]: AutopenServiceProvider
[^config]: Font registry config (58 entries)
[^test]: Pest library count and GFXFont coverage
