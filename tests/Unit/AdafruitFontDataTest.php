<?php

use ScrapyardIO\Fonts\FreeMono\FreeMono9Pt;

/**
 * Data-integrity checks for the adafruit 1bpp encoding family, pinned against
 * FreeMono9Pt as ported from GFXFonts 0.2.0.
 */
test('FreeMono9Pt resolves as an adafruit 1bpp font', function () {
    $font = new FreeMono9Pt;

    expect($font->getFontEncoding())->toBe('adafruit')
        ->and($font->getBitsPerPixel())->toBe(1)
        ->and($font->getYOffsetMode())->toBe('raw')
        ->and($font->getFirst())->toBe(0x20)
        ->and($font->getLast())->toBe(0x7E)
        ->and($font->getYAdvance())->toBe(14)
        ->and($font->getCapHeight())->toBe(13);
});

test('FreeMono9Pt carries one glyph per character in its range', function () {
    $font = new FreeMono9Pt;

    $glyphs = new ReflectionProperty($font, 'glyphs');

    expect(count($glyphs->getValue($font)))->toBe(0x7E - 0x20 + 1);
});

test("the glyph for 'A' survived the port byte-for-byte", function () {
    $glyph = (new FreeMono9Pt)->getGlyphInfo(0x41);

    expect($glyph)->toBe([
        'bitmapOffset' => 237,
        'width' => 11,
        'height' => 10,
        'xAdvance' => 11,
        'xOffset' => 0,
        'yOffset' => -9,
        'valid' => 1,
    ]);
});

test('adafruit glyph bitmaps stay within the packed bitmap table', function () {
    $font = new FreeMono9Pt;

    $bitmap_count = count((new ReflectionProperty($font, 'bitmaps'))->getValue($font));

    // 0x7D and 0x7E overrun the 840-byte table in the upstream 0.2.0 data;
    // the mechanical port preserves that quirk verbatim, so stop before them.
    for ($char = $font->getFirst(); $char <= 0x7C; $char++) {
        $glyph = $font->getGlyphInfo($char);
        $bytes = intdiv(($glyph['width'] * $glyph['height']) + 7, 8);

        expect($glyph['bitmapOffset'] + $bytes)->toBeLessThanOrEqual($bitmap_count, "glyph {$char} overruns the bitmap table");
    }
});

test('the upstream FreeMono9Pt bitmap truncation quirk is preserved verbatim', function () {
    $font = new FreeMono9Pt;

    $bitmap_count = count((new ReflectionProperty($font, 'bitmaps'))->getValue($font));

    expect($bitmap_count)->toBe(840)
        ->and($font->getGlyphInfo(0x7D)['bitmapOffset'])->toBe(836)
        ->and($font->getGlyphInfo(0x7E)['bitmapOffset'])->toBe(841);
});

test('an out-of-range character reports an invalid glyph', function () {
    $glyph = (new FreeMono9Pt)->getGlyphInfo(0x1F);

    expect($glyph[6])->toBe(0);
});
