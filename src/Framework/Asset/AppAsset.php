<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use Yii\Asset\Css\FontAwesomeBrand;
use Yii\Asset\Flowbite;
use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

/**
 * Asset bundle for the application in development mode, mainly used for publishing assets.
 */
final class AppAsset extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@resource/asset';
    public array $css = ['css/app.css'];
    public array $js = ['js/app.js'];
    public array $depends = [
        Flowbite::class,
        FontAwesomeBrand::class,
        LocaleAsset::class,
        ThemeAsset::class,
    ];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = [
            'filter' => $pathMatcher->only('**/app.css', '**/app.js'),
        ];
    }
}
