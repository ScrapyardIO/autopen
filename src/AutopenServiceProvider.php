<?php

namespace ScrapyardIO\Fonts;

use Fabricate\Core\Machine as ScrapyardIOMachine;
use Fabricate\NutsAndBolts\MagicAliases\Font;
use Fabricate\NutsAndBolts\ServiceProvider;

class AutopenServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->publishConfig();
    }

    public function boot(): void
    {
        $this->registerEnabledFonts();
    }

    protected function publishConfig(): void
    {
        $source = realpath($raw = __DIR__.'/../config/fonts.php') ?: $raw;

        if ($this->program instanceof ScrapyardIOMachine && $this->program->runningInConsole()) {
            $this->publishes([$source => $this->program->configPath('fonts.php')]);
        }

        $this->mergeConfigFrom($source, 'fonts');
    }

    protected function registerEnabledFonts(): void
    {
        $fonts = config('fonts', []);

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

            Font::addFont($name, $class);
        }
    }
}
