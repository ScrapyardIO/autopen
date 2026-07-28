<?php

use ScrapyardIO\Fonts\FreeMono\Bold\FreeMono9PtBold;
use ScrapyardIO\Fonts\FreeMono\BoldOblique\FreeMono9PtBoldOblique;
use ScrapyardIO\Fonts\FreeMono\FreeMono12Pt;
use ScrapyardIO\Fonts\FreeMono\FreeMono9Pt;
use ScrapyardIO\Fonts\FreeMono\Oblique\FreeMono9PtOblique;
use ScrapyardIO\Fonts\FreeSans\Bold\FreeSans9PtBold;
use ScrapyardIO\Fonts\FreeSans\BoldOblique\FreeSans9PtBoldOblique;
use ScrapyardIO\Fonts\FreeSans\FreeSans12Pt;
use ScrapyardIO\Fonts\FreeSans\FreeSans9Pt;
use ScrapyardIO\Fonts\FreeSans\Oblique\FreeSans9PtOblique;
use ScrapyardIO\Fonts\FreeSerif\Bold\FreeSerif9PtBold;
use ScrapyardIO\Fonts\FreeSerif\BoldItalic\FreeSerif9PtBoldItalic;
use ScrapyardIO\Fonts\FreeSerif\FreeSerif12Pt;
use ScrapyardIO\Fonts\FreeSerif\FreeSerif9Pt;
use ScrapyardIO\Fonts\FreeSerif\Italic\FreeSerif9PtItalic;
use ScrapyardIO\Fonts\Montserrat\Montserrat12;
use ScrapyardIO\Fonts\Montserrat\Montserrat14;
use ScrapyardIO\Fonts\Montserrat\Montserrat16;
use ScrapyardIO\Fonts\Montserrat\Montserrat18;
use ScrapyardIO\Fonts\Montserrat\Montserrat20;
use ScrapyardIO\Fonts\Montserrat\Montserrat24;
use ScrapyardIO\Fonts\OneOffs\Org01Font;
use ScrapyardIO\Fonts\OneOffs\PicoPixelFont;
use ScrapyardIO\Fonts\OneOffs\Tiny3x3A2PtFont;
use ScrapyardIO\Fonts\OneOffs\TomThumbFont;
use ScrapyardIO\Fonts\U8g2\Font5x8;
use ScrapyardIO\Fonts\U8g2\Font6x10;
use ScrapyardIO\Fonts\U8g2\Font6x12;
use ScrapyardIO\Fonts\U8g2\Font7x13;
use ScrapyardIO\Fonts\U8g2\Font8x13;
use ScrapyardIO\Fonts\U8g2\Profont10;
use ScrapyardIO\Fonts\U8g2\Profont11;
use ScrapyardIO\Fonts\U8g2\Profont12;
use ScrapyardIO\Fonts\U8g2\Spleen5x8;
use ScrapyardIO\Fonts\U8g2\Spleen6x12;
use ScrapyardIO\Fonts\U8g2\Unifont16;
use ScrapyardIO\Fonts\Unscii\Unscii16;
use ScrapyardIO\Fonts\Unscii\Unscii8;

return [
    'free-sans-9pt' => ['class' => FreeSans9Pt::class, 'enabled' => true],
    'free-sans-12pt' => ['class' => FreeSans12Pt::class, 'enabled' => false],
    'free-sans-9pt-bold' => ['class' => FreeSans9PtBold::class, 'enabled' => false],
    'free-sans-9pt-oblique' => ['class' => FreeSans9PtOblique::class, 'enabled' => false],
    'free-sans-9pt-bold-oblique' => ['class' => FreeSans9PtBoldOblique::class, 'enabled' => false],

    'free-mono-9pt' => ['class' => FreeMono9Pt::class, 'enabled' => false],
    'free-mono-12pt' => ['class' => FreeMono12Pt::class, 'enabled' => false],
    'free-mono-9pt-bold' => ['class' => FreeMono9PtBold::class, 'enabled' => false],
    'free-mono-9pt-oblique' => ['class' => FreeMono9PtOblique::class, 'enabled' => false],
    'free-mono-9pt-bold-oblique' => ['class' => FreeMono9PtBoldOblique::class, 'enabled' => false],

    'free-serif-9pt' => ['class' => FreeSerif9Pt::class, 'enabled' => false],
    'free-serif-12pt' => ['class' => FreeSerif12Pt::class, 'enabled' => false],
    'free-serif-9pt-bold' => ['class' => FreeSerif9PtBold::class, 'enabled' => false],
    'free-serif-9pt-italic' => ['class' => FreeSerif9PtItalic::class, 'enabled' => false],
    'free-serif-9pt-bold-italic' => ['class' => FreeSerif9PtBoldItalic::class, 'enabled' => false],

    'montserrat-12' => ['class' => Montserrat12::class, 'enabled' => false],
    'montserrat-14' => ['class' => Montserrat14::class, 'enabled' => false],
    'montserrat-16' => ['class' => Montserrat16::class, 'enabled' => false],
    'montserrat-18' => ['class' => Montserrat18::class, 'enabled' => false],
    'montserrat-20' => ['class' => Montserrat20::class, 'enabled' => false],
    'montserrat-24' => ['class' => Montserrat24::class, 'enabled' => false],

    'unscii-8' => ['class' => Unscii8::class, 'enabled' => false],
    'unscii-16' => ['class' => Unscii16::class, 'enabled' => false],

    'org-01' => ['class' => Org01Font::class, 'enabled' => false],
    'pico-pixel' => ['class' => PicoPixelFont::class, 'enabled' => false],
    'tiny-3x3-a2pt' => ['class' => Tiny3x3A2PtFont::class, 'enabled' => false],
    'tom-thumb' => ['class' => TomThumbFont::class, 'enabled' => false],

    'u8g2-5x8' => ['class' => Font5x8::class, 'enabled' => false],
    'u8g2-6x10' => ['class' => Font6x10::class, 'enabled' => false],
    'u8g2-6x12' => ['class' => Font6x12::class, 'enabled' => false],
    'u8g2-7x13' => ['class' => Font7x13::class, 'enabled' => false],
    'u8g2-8x13' => ['class' => Font8x13::class, 'enabled' => false],
    'u8g2-profont-10' => ['class' => Profont10::class, 'enabled' => false],
    'u8g2-profont-11' => ['class' => Profont11::class, 'enabled' => false],
    'u8g2-profont-12' => ['class' => Profont12::class, 'enabled' => false],
    'u8g2-spleen-5x8' => ['class' => Spleen5x8::class, 'enabled' => false],
    'u8g2-spleen-6x12' => ['class' => Spleen6x12::class, 'enabled' => false],
    'u8g2-unifont-16' => ['class' => Unifont16::class, 'enabled' => false],
];
