<?php

use ScrapyardIO\Fonts\Montserrat\Montserrat12;
use ScrapyardIO\Fonts\Unscii\Unscii8;

/**
 * Data-integrity checks for the LVGL encoding family, pinned against
 * Montserrat12 (4bpp anti-aliased) and Unscii8 (1bpp) as ported from
 * GFXFonts 0.2.0.
 */
test('Montserrat12 resolves as an LVGL 4bpp anti-aliased font', function () {
    $font = new Montserrat12;

    expect($font->getFontEncoding())->toBe('lvgl')
        ->and($font->getBitsPerPixel())->toBe(4)
        ->and($font->getYOffsetMode())->toBe('raw')
        ->and($font->getFirst())->toBe(0x20)
        ->and($font->getLast())->toBe(0x7E)
        ->and($font->getYAdvance())->toBe(15);
});

test('Montserrat12 keeps the reserved all-zero glyph at index 0', function () {
    $font = new Montserrat12;

    $glyphs = (new ReflectionProperty($font, 'glyphs'))->getValue($font);

    expect($glyphs[0])->toBe([0, 0, 0, 0, 0, 0])
        ->and(count($glyphs))->toBeGreaterThanOrEqual(0x7E - 0x20 + 2);
});

test("Montserrat12 maps 'A' through the LVGL +1 glyph shift", function () {
    $glyph = (new Montserrat12)->getGlyphInfo(0x41);

    expect($glyph)->toBe([
        'bitmapOffset' => 848,
        'width' => 10,
        'height' => 9,
        'xAdvance' => 9,
        'xOffset' => -1,
        'yOffset' => 0,
        'valid' => 1,
    ]);
});

test('Montserrat12 4bpp glyph data has the expected packed shape', function () {
    $font = new Montserrat12;

    $bitmap_count = count((new ReflectionProperty($font, 'bitmaps'))->getValue($font));

    for ($char = $font->getFirst(); $char <= $font->getLast(); $char++) {
        $glyph = $font->getGlyphInfo($char);
        // 4bpp: two pixels per byte.
        $bytes = intdiv(($glyph['width'] * $glyph['height']) + 1, 2);

        expect($glyph['valid'])->toBe(1)
            ->and($glyph['bitmapOffset'] + $bytes)->toBeLessThanOrEqual($bitmap_count, "glyph {$char} overruns the bitmap table");
    }
});

test('Unscii8 resolves as an LVGL 1bpp font with line-space y offsets', function () {
    $font = new Unscii8;

    expect($font->getFontEncoding())->toBe('lvgl')
        ->and($font->getBitsPerPixel())->toBe(1)
        ->and($font->getYOffsetMode())->toBe('lvgl_line')
        ->and($font->getYAdvance())->toBe(9);
});

test("Unscii8 maps 'A' through the LVGL +1 glyph shift", function () {
    $glyph = (new Unscii8)->getGlyphInfo(0x41);

    expect($glyph)->toBe([
        'bitmapOffset' => 154,
        'width' => 6,
        'height' => 7,
        'xAdvance' => 8,
        'xOffset' => 1,
        'yOffset' => 1,
        'valid' => 1,
    ]);
});
