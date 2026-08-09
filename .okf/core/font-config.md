---
type: Core
title: Font config
description: config/fonts.php — 58 slug entries merged as autopen-fonts; defaults free-sans-9pt, helvb-12, logisoso-16.
resource: config/fonts.php
tags: [core, config, fonts, registry]
generated: { by: okf-documentation-generator/cursor, at: "2026-08-09T20:18:00Z" }
status: draft
sources:
  - id: config
    resource: config/fonts.php
    title: Font slug map
  - id: provider
    resource: src/AutopenServiceProvider.php
    title: mergeConfigFrom + publish tag
---

# Shape

Package file [`config/fonts.php`](../../config/fonts.php) returns an associative array:[^config]

| Key | Type | Meaning |
|-----|------|---------|
| slug (array key) | `string` | Name passed to `Font::extend($name, …)` |
| `class` | `class-string` | FQCN under `ScrapyardIO\Fonts\…` |
| `enabled` | `bool` | When true, provider registers the font at boot |

Merged config key: **`autopen-fonts`**. Publish tag: **`autopen-fonts-config`** (destination filename `autopen-fonts.php`).[^provider]

# Counts

- **58** total entries (one per shipped font class).[^config]
- **3** enabled by default:

| Slug | Class |
|------|-------|
| `free-sans-9pt` | `ScrapyardIO\Fonts\FreeSans\FreeSans9Pt` |
| `helvb-12` | `ScrapyardIO\Fonts\HelvB\HelvB12` |
| `logisoso-16` | `ScrapyardIO\Fonts\Logisoso\Logisoso16` |

All other slugs ship with `enabled => false`; apps enable what they need after publish or by merging config.

# Related

- [AutopenServiceProvider](autopen-service-provider.md)
- [Font library](font-library.md)

[^config]: Font slug map
[^provider]: mergeConfigFrom + publish tag
