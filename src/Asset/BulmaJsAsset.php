<?php

declare(strict_types=1);

namespace App\Asset;

use Yiisoft\Assets\AssetBundle;

final class BulmaJsAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@npm/@vizuaalog/bulmajs/dist';

    public array $js = [
        'file.js',
        'message.js',
        'navbar.js'
    ];

    public array $publishOptions = [
        'only' => [
            'file.js',
            'message.js',
            'navbar.js'
        ]
    ];
}
