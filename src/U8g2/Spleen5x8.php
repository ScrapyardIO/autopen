<?php

namespace ScrapyardIO\Fonts\U8g2;

use Fabricate\Rendering\Fonts\GFXFont;

/**
 * Spleen5x8 font
 * Converted from U8g2 C font definition
 */
class Spleen5x8 extends GFXFont
{
    protected int $first = 0x20;
    protected int $last = 0x7E;
    protected int $yAdvance = 13;
    protected bool $isColumnMajor = false;  // Row-major format

    protected array $bitmaps = [
        // No bitmap data
    ];

    public static function getClass(): static
    {
        return new self();
    }
}
