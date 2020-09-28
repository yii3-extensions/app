<?php

declare(strict_types=1);

namespace Yii;

use function array_merge;

final class Console
{
    public function buildConfig(): array
    {
        return array_merge(
            require(__DIR__ . '/Component/DiContainer.php')
        );
    }
}
