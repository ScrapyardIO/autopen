<?php

namespace ScrapyardIO\Fonts;

use Fabricate\NutsAndBolts\ServiceProvider;
use ScrapyardIO\Tubes\Core\MagicAliases\Font;

class AutopenServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $source = realpath($raw = __DIR__.'/../config/fonts.php') ?: $raw;

        $this->mergeConfigFrom($source, 'autopen-fonts');
    }

    public function boot(): void
    {
        if ($this->container->runningInConsole()) {
            $source = realpath($raw = __DIR__.'/../config/fonts.php') ?: $raw;

            $this->publishes([
                $source => $this->container->configPath('autopen-fonts.php'),
            ], 'autopen-fonts-config');
        }

        $this->registerEnabledFonts();
    }

    protected function registerEnabledFonts(): void
    {
        $fonts = config('autopen-fonts', []);

        if (! is_array($fonts) || $fonts === []) {
            return;
        }

        foreach ($fonts as $name => $entry) {
            if (! is_string($name) || $name === '' || ! is_array($entry)) {
                continue;
            }

            if (! ($entry['enabled'] ?? false)) {
                continue;
            }

            $class = $entry['class'] ?? null;

            if (! is_string($class) || $class === '') {
                continue;
            }

            Font::extend($name, $class);
        }
    }
}
