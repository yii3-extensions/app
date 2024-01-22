<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

/**
 * Asset bundle for locale urls.
 **/
final class LocaleAsset extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@npm/flag-icons';
    public array $css = ['/css/flag-icons.css'];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = [
            'filter' => $pathMatcher->only('**/css/flag-icons.css', 'flags/**/*'),
        ];
    }
}
