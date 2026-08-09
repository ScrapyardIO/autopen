<?php

use ScrapyardIO\Fonts\OneOffs\Org01Font;
use ScrapyardIO\Fonts\OneOffs\PicoPixelFont;
use ScrapyardIO\Fonts\OneOffs\Tiny3x3A2PtFont;
use ScrapyardIO\Fonts\OneOffs\TomThumbFont;
use ScrapyardIO\Tubes\Contracts\Fonts\GFXFont;

/**
 * @return array<string, class-string<GFXFont>>
 */
function oneOffFontClasses(): array
{
    return [
        'Org01Font' => Org01Font::class,
        'PicoPixelFont' => PicoPixelFont::class,
        'TomThumbFont' => TomThumbFont::class,
        'Tiny3x3A2PtFont' => Tiny3x3A2PtFont::class,
    ];
}

test('each OneOff carries bitmap data and covers its declared glyph range', function () {
    foreach (oneOffFontClasses() as $name => $class) {
        $font = new $class;
        $glyphs = (new ReflectionProperty($font, 'glyphs'))->getValue($font);
        $range = $font->getLast() - $font->getFirst() + 1;

        expect($font->hasBitmapData())->toBeTrue("{$name} missing bitmap data")
            ->and(count($glyphs))->toBeGreaterThanOrEqual($range, "{$name} glyph table shorter than first..last");

        // TomThumb ships Adafruit's extended Latin table (204 entries) while
        // GFXfont first/last stays 0x20..0x7E — pin that upstream quirk.
        if ($name === 'TomThumbFont') {
            expect(count($glyphs))->toBe(204);
        } else {
            expect(count($glyphs))->toBe($range);
        }
    }
});

test("Org01Font glyph for 'A' matches Adafruit Org_01.h", function () {
    $glyph = (new Org01Font)->getGlyphInfo(0x41);

    expect($glyph)->toBe([
        'bitmapOffset' => 87,
        'width' => 5,
        'height' => 5,
        'xAdvance' => 6,
        'xOffset' => 0,
        'yOffset' => -4,
        'valid' => 1,
    ]);
});

test('OneOff yAdvance values match Adafruit GFXfont structs', function () {
    expect((new Org01Font)->getYAdvance())->toBe(7)
        ->and((new PicoPixelFont)->getYAdvance())->toBe(7)
        ->and((new TomThumbFont)->getYAdvance())->toBe(6)
        ->and((new Tiny3x3A2PtFont)->getYAdvance())->toBe(4);
});
