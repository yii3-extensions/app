<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use Yiisoft\Assets\AssetBundle;

/**
 * Asset bundle for locale urls.
 **/
final class LocaleAsset extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@npm/flag-icons/';

    public array $css = ['css/flag-icons.css'];

    public array $publishOptions = [
        'only' => [
            'flag-icons.css',
            'flags/**/*',
        ],
    ];
}
