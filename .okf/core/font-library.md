---
type: Core
title: Font library
description: 58 GFXFont subclasses across nine family folders; Unifont16 intentionally ships empty bitmaps.
resource: src/
tags: [core, fonts, library, gfxfont]
generated: { by: okf-documentation-generator/cursor, at: "2026-08-09T20:18:00Z" }
status: draft
sources:
  - id: config
    resource: config/fonts.php
    title: Slug → class map (58 entries)
  - id: test
    resource: tests/Unit/FontLibraryTest.php
    title: Expects 58 fonts; empty bitmaps skipped for offset checks
  - id: unifont
    resource: src/U8g2/Unifont16.php
    title: Unifont16 empty $bitmaps
  - id: tools
    resource: tools/README.md
    title: Conversion tools; Unifont16 left empty intentionally
---

# Role

Autopen’s product surface is the **font data library**: concrete subclasses of tubes’ `GFXFont`, organized by family under `src/`.[^config] Pest `FontLibraryTest` discovers every nested PHP class under `src/` (excluding the top-level provider) and expects **58** fonts.[^test]

# Families (on disk)

| Folder | Count | Notes |
|--------|------:|-------|
| `FreeSans/` | 10 | Regular / bold / oblique / bold-oblique at 9–24pt sizes |
| `FreeMono/` | 10 | Same style matrix as FreeSans |
| `FreeSerif/` | 10 | Regular / bold / italic / bold-italic matrix |
| `Montserrat/` | 6 | 12–24 sizes |
| `U8g2/` | 11 | Bitmap packs + stubs; includes Unifont16 |
| `HelvB/` | 4 | HelvB08 / 10 / 12 / 14 |
| `OneOffs/` | 4 | Org01, PicoPixel, Tiny3x3A2Pt, TomThumb |
| `Unscii/` | 2 | Unscii8 / Unscii16 |
| `Logisoso/` | 1 | Logisoso16 |

**Total: 58.**

# Unifont16 (empty bitmaps)

`ScrapyardIO\Fonts\U8g2\Unifont16` ships with an empty `$bitmaps` array intentionally (too large for this wave).[^unifont][^tools] Library tests skip bitmap-offset assertions when `count($bitmaps) === 0`.[^test]

# Generation tools (optional)

`tools/` holds BDF / Adafruit `fontconvert` → PHP converters (`tools/README.md`). Raw BDF/TTF/build artifacts are gitignored; only converter scripts ship.[^tools]

# Related

- [Font config](font-config.md)
- [Ownership vs tubes](../orientation/ownership-vs-tubes.md)

[^config]: Slug → class map (58 entries)
[^test]: Expects 58 fonts; empty bitmaps skipped for offset checks
[^unifont]: Unifont16 empty $bitmaps
[^tools]: Conversion tools; Unifont16 left empty intentionally
