<?php

declare(strict_types=1);

namespace Yii;

use function array_merge;

final class Web
{
    public function buildConfig(): array
    {
        return array_merge(
            require(__DIR__ . '/Component/Main.php'),
            require(__DIR__ . '/Component/Helpers.php'),
            require(__DIR__ . '/Component/Psr17.php'),
            require(__DIR__ . '/Component/DataResponse.php'),
            require(__DIR__ . '/Component/Session.php'),
        );
    }
}
