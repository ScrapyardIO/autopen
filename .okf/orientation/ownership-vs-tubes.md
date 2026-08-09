---
type: Orientation
title: Ownership vs tubes
description: Autopen owns font data packs; tubes owns GFXFont, FontManager, and the Font MagicAlias registry.
tags: [orientation, ownership, tubes, fonts, companion, 0.7]
generated: { by: okf-documentation-generator/cursor, at: "2026-08-09T20:18:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Requires scrapyard-io/tubes ^0.7
  - id: provider
    resource: src/AutopenServiceProvider.php
    title: Font::extend registration into tubes MagicAlias
  - id: unifont
    resource: src/U8g2/Unifont16.php
    title: Example GFXFont subclass (empty bitmaps)
---

# Decision

| Owner | Owns |
|-------|------|
| **tubes** | Glyph model (`GFXFont`), built-in `ClassicFont`, `FontManager`, MagicAlias `Font`, `Font::extend` / `Font::font()` API, text drawing on Renderer2D |
| **autopen** | Extended font *data* classes under `ScrapyardIO\Fonts\…`, `config/fonts.php`, and enabling those packs via `AutopenServiceProvider`[^provider] |

Autopen **depends on** tubes (`^0.7.0`); it does not reimplement the registry.[^composer] Each shipped class extends tubes’ `ScrapyardIO\Tubes\Contracts\Fonts\GFXFont`.[^unifont]

# Implications

1. Apps that want the extended library **require** `scrapyard-io/autopen` in addition to tubes — tubes alone only ships the built-in classic font path.
2. Do **not** move bitmap packs into tubes “for convenience,” and do **not** put `GFXFont` / `FontManager` into autopen.
3. Registration is always `Font::extend($slug, $class)` from the Autopen provider for `enabled` config entries — same companion plug-in pattern as Window / Framebuffer drivers.[^provider]
4. Do **not** document or restore 0.6 `fabricate/fonts` as the 0.7 home for this library.

# Related

- [Package (0.7)](package.md)
- [Companion package](../conventions/companion-package.md)
- [AutopenServiceProvider](../core/autopen-service-provider.md)

[^composer]: Requires scrapyard-io/tubes ^0.7
[^provider]: Font::extend registration into tubes MagicAlias
[^unifont]: Example GFXFont subclass (empty bitmaps)
