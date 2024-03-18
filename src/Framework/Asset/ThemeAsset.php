<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use Yiisoft\{Assets\AssetBundle, Files\PathMatcher\PathMatcher};

/**
 * Asset bundle for the theme in development mode, mainly used for publishing assets.
 */
final class ThemeAsset extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@resource/asset/js';
    public array $js = ['theme.js'];
    public int|null $jsPosition = 1;

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = [
            'filter' => $pathMatcher->only('**/theme.js'),
        ];
    }
}
