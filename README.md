## ScrapyardIO Autopen

> **Note:** This repository is the ScrapyardIO **extended fonts companion** (`scrapyard-io/autopen`). It is not a full application skeleton — pair it with [`scrapyard-io/framework`](https://github.com/ScrapyardIO/framework) and [`scrapyard-io/tubes`](https://github.com/scrapyard-io/tubes) **0.7**.

Autopen ships GFXFont bitmap faces under `ScrapyardIO\Fonts\`. Enabled faces are registered at boot via `AutopenServiceProvider` → `Font::extend`. Defaults: `free-sans-9pt`, `helvb-12`, `logisoso-16`.

```bash
composer require scrapyard-io/autopen:^0.7.0
php workshop vendor:publish --tag=autopen-fonts-config
```

### Official Documentation

Documentation for Autopen lives on the [ScrapyardIO website](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x/overview):

- [Overview](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x/overview)
- [Installation](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x/installation)
- [Usage](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x/usage)
- [Reference](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x/reference)
- [Related](https://scrapyard-io.projectsaturnstudios.com/ecosystem/scrapyard-io/autopen/0.7.x/related)

### Contributing

Thank you for considering contributing to Autopen! Please open issues and pull requests on [GitHub](https://github.com/scrapyard-io/autopen).

### License

Autopen is open-sourced software licensed under the [MIT license](LICENSE).
