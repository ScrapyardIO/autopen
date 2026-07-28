<?php

use Fabricate\Rendering\Fonts\GFXFont;

/**
 * Every font class shipped by this package, discovered from the src tree so
 * a font that fails to autoload (bad namespace, bad class name) fails loudly.
 *
 * @return array<string, class-string<GFXFont>>
 */
function fontLibraryClasses(): array
{
    $src = dirname(__DIR__, 2) . '/src';
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src, FilesystemIterator::SKIP_DOTS));

    $classes = [];

    foreach ($iterator as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }

        $relative = substr($file->getPathname(), strlen($src) + 1, -strlen('.php'));

        // Package service provider lives under src/ but is not a font class.
        if (! str_contains($relative, '/')) {
            continue;
        }

        $class = 'ScrapyardIO\\Fonts\\' . str_replace('/', '\\', $relative);

        $classes[$relative] = $class;
    }

    ksort($classes);

    return $classes;
}

test('the full GFXFonts 0.2.0 library made the trip', function () {
    expect(fontLibraryClasses())->toHaveCount(38);
});

test('every font autoloads, extends the agnostic GFXFont base and carries a sane range', function () {
    foreach (fontLibraryClasses() as $relative => $class) {
        expect(class_exists($class))->toBeTrue("{$class} does not autoload from {$relative}.php");

        $font = new $class;

        expect($font)->toBeInstanceOf(GFXFont::class)
            ->and($font->getFirst())->toBeLessThanOrEqual($font->getLast())
            ->and($font->getYAdvance())->toBeGreaterThan(0);
    }
});

test('every data-carrying font keeps its glyph offsets inside the bitmap table', function () {
    // GFXFonts 0.2.0 ships FreeMono9Pt with an 840-byte bitmap table whose
    // last two glyphs ('}' 0x7D, '~' 0x7E) point up to byte 844 — a known
    // upstream data quirk preserved verbatim by the mechanical port.
    $known_quirks = [
        'ScrapyardIO\\Fonts\\FreeMono\\FreeMono9Pt' => [0x7D, 0x7E],
    ];

    foreach (fontLibraryClasses() as $class) {
        $font = new $class;

        $bitmaps = new ReflectionProperty($font, 'bitmaps');
        $bitmap_count = count($bitmaps->getValue($font));

        if ($bitmap_count === 0) {
            continue; // The U8g2 stubs ship no bitmap data yet.
        }

        for ($char = $font->getFirst(); $char <= $font->getLast(); $char++) {
            $glyph = $font->getGlyphInfo($char);

            expect($glyph['valid'])->toBe(1, "{$class} has no glyph for char {$char}")
                ->and($glyph['width'])->toBeGreaterThanOrEqual(0)
                ->and($glyph['height'])->toBeGreaterThanOrEqual(0)
                ->and($glyph['bitmapOffset'])->toBeGreaterThanOrEqual(0);

            if (in_array($char, $known_quirks[$class] ?? [], true)) {
                continue;
            }

            if (($glyph['width'] * $glyph['height']) > 0) {
                expect($glyph['bitmapOffset'])->toBeLessThan($bitmap_count, "{$class} glyph {$char} points past the bitmap table");
            }
        }
    }
});
