---
type: Convention
title: Companion package
description: autopen is an opt-in ScrapyardIO fonts companion depending on tubes — not fabricate/fonts and not framework core.
tags: [convention, companion, fonts, tubes, provider]
generated: { by: okf-documentation-generator/cursor, at: "2026-08-09T20:18:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Requires tubes; scrapyard-io providers; ScrapyardIO\Fonts namespace
  - id: provider
    resource: src/AutopenServiceProvider.php
    title: Package-owned provider registering into Font MagicAlias
---

# Rule

`scrapyard-io/autopen` is a **companion** to `scrapyard-io/tubes` 0.7 (which itself is a companion to framework), not a Fabricate domain and not the legacy `fabricate/fonts` package.[^composer]

Therefore:

1. It **owns** font data + `AutopenServiceProvider` under `ScrapyardIO\Fonts\…`.[^provider]
2. Discovery uses Composer `extra.scrapyard-io.providers` — no Core MagicAlias ownership here.[^composer]
3. Composer **requires** `scrapyard-io/tubes` `^0.7.0`; do not depend on or revive `fabricate/fonts` for 0.7.[^composer]
4. Knowledge for this package lives at **package-root** `.okf/` only — never nest `.okf` under `src/`.
5. Fonts remain **opt-in**; apps without autopen still have tubes’ built-in classic font path only.

# Related

- [Ownership vs tubes](../orientation/ownership-vs-tubes.md)
- [Package (0.7)](../orientation/package.md)
- [AutopenServiceProvider](../core/autopen-service-provider.md)

[^composer]: Requires tubes; scrapyard-io providers; ScrapyardIO\Fonts namespace
[^provider]: Package-owned provider registering into Font MagicAlias
