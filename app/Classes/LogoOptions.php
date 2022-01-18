<?php

namespace App\Classes;

use chillerlan\QRCode\QROptions;

/**
 * @property int $logoSpaceWidth
 * @property int $logoSpaceHeight
 *
 * @noinspection PhpIllegalPsrClassPathInspection
 */
class LogoOptions extends QROptions
{
    // size in QR modules, multiply with QROptions::$scale for pixel size
    protected int $logoSpaceWidth;
    protected int $logoSpaceHeight;
}
