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
            require(__DIR__ . '/Component/Aliases.php'),
            require(__DIR__ . '/Component/Parameters.php'),
            require(__DIR__ . '/Component/YiiWeb.php'),
            require(__DIR__ . '/Component/Router.php'),
            require(__DIR__ . '/Component/LogTargetFile.php'),
            require(__DIR__ . '/Component/Assets.php'),
            require(__DIR__ . '/Component/View.php'),
            require(__DIR__ . '/Component/Mailer.php'),
            require(__DIR__ . '/Component/Validator.php'),
            require(__DIR__ . '/Component/Psr17.php'),
            require(__DIR__ . '/Component/DataResponse.php'),
            require(__DIR__ . '/Component/Session.php'),
        );
    }
}
