---
type: Core
title: AutopenServiceProvider
description: Package provider merges autopen-fonts config, publishes it, and Font::extend-registers enabled fonts.
resource: src/AutopenServiceProvider.php
tags: [core, provider, fonts, discovery]
generated: { by: okf-documentation-generator/cursor, at: "2026-08-09T20:18:00Z" }
status: draft
sources:
  - id: provider
    resource: src/AutopenServiceProvider.php
    title: AutopenServiceProvider implementation
  - id: composer
    resource: composer.json
    title: extra.scrapyard-io.providers discovery
  - id: config
    resource: config/fonts.php
    title: Source config merged as autopen-fonts
---

# Role

`ScrapyardIO\Fonts\AutopenServiceProvider` is the sole package entry discovered via Composer `extra.scrapyard-io.providers`.[^composer] It extends `Fabricate\NutsAndBolts\ServiceProvider`.[^provider]

# Register

Merges package `config/fonts.php` under the config key **`autopen-fonts`**:[^provider][^config]

```php
$this->mergeConfigFrom($source, 'autopen-fonts');
```

# Boot

1. **Publish (console only):** tag `autopen-fonts-config` → app `configPath('autopen-fonts.php')`.[^provider]
2. **`registerEnabledFonts()`:** reads `config('autopen-fonts')`; for each entry with `enabled === true` and a non-empty `class` string, calls:[^provider]

```php
use ScrapyardIO\Tubes\Core\MagicAliases\Font;

Font::extend($name, $class);
```

Disabled or malformed entries are skipped. An empty/non-array config returns early.

# Related

- [Font config](font-config.md)
- [Ownership vs tubes](../orientation/ownership-vs-tubes.md)
- [Companion package](../conventions/companion-package.md)

[^provider]: AutopenServiceProvider implementation
[^composer]: extra.scrapyard-io.providers discovery
[^config]: Source config merged as autopen-fonts
