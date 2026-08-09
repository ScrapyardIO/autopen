# Agent guidelines — scrapyard-io/autopen

## Knowledge Bundle (OKF)

This package ships an Open Knowledge Format bundle at [`.okf/`](.okf/) (excluded from Composer dist via `.gitattributes` `export-ignore`).

Before changing autopen code or advising on ScrapyardIO extended fonts architecture **for this package**:

1. Read [`.okf/index.md`](.okf/index.md) first (progressive disclosure).
2. Open only the linked concepts needed for the task.
3. Prefer `status: stable` concepts; treat `deprecated` as historical only. New/changed concepts stay `status: draft` until a human verifies them.
4. When you learn something durable about **this package**, update the affected `.okf` concept(s) and append `.okf/log.md`.
5. Keep the `.okf` bundle at the **package root** only — do not nest extra `.okf` folders under `src/`.
6. Tubes GFXFont / FontManager / rendering / window knowledge belongs in the tubes package’s own docs / `.okf` bundle, not here. Framework and GPIO knowledge belong in those packages.

## Package rules (quick) — 0.7.x

- Composer: `scrapyard-io/autopen` **0.7.0**. PHP `^8.4|^8.5|^8.6`. Namespace `ScrapyardIO\Fonts\` → `src/`.
- Requires `scrapyard-io/tubes` `^0.7.0` — **not** `fabricate/fonts`.
- Discovery: `extra.scrapyard-io.providers` → `ScrapyardIO\Fonts\AutopenServiceProvider`.
- Config: `config/fonts.php` merged as `autopen-fonts`; publish with tag `autopen-fonts-config`. See `.okf/core/font-config.md`.
- Boot: for each enabled entry, `Font::extend($name, $class)` via tubes MagicAlias `ScrapyardIO\Tubes\Core\MagicAliases\Font`.
- Defaults enabled: `free-sans-9pt`, `helvb-12`, `logisoso-16` (55 others ship disabled).
- Library: **58** `GFXFont` subclasses under `src/{FreeMono,FreeSans,FreeSerif,HelvB,Logisoso,Montserrat,OneOffs,U8g2,Unscii}/`. `Unifont16` has empty bitmaps intentionally. Pest `FontLibraryTest` expects 58.
- **Ownership:** autopen owns font *data*; tubes owns GFXFont / FontManager / Font MagicAlias. See `.okf/orientation/ownership-vs-tubes.md`.
- Optional generators live under `tools/` (BDF / Adafruit → PHP); do not invent 0.6 fabricate/fonts APIs.
