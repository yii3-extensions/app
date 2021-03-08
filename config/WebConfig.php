<?php

declare(strict_types=1);

namespace Config;

use function array_merge;

final class WebConfig
{
    public function get(): array
    {
        return array_merge(
            require(__DIR__ . '/Common/yiisoft-aliases.php'),
            require(__DIR__ . '/Common/yiisoft-cache.php'),
            require(__DIR__ . '/Common/yiisoft-event-dispatcher.php'),
            require(__DIR__ . '/Common/yiisoft-i18n.php'),
            require(__DIR__ . '/Common/yiisoft-log-target-file.php'),
            require(__DIR__ . '/Common/yiisoft-router.php'),
            require(__DIR__ . '/Common/yiisoft-translator.php'),
            require(__DIR__ . '/Web/psr-http-message.php'),
            require(__DIR__ . '/Web/yiisoft-assets.php'),
            require(__DIR__ . '/Web/yiisoft-csrf.php'),
            require(__DIR__ . '/Web/yiisoft-data-response.php'),
            require(__DIR__ . '/Web/yiisoft-error-handler.php'),
            require(__DIR__ . '/Web/yiisoft-middleware-dispatcher.php'),
            require(__DIR__ . '/Web/yiisoft-session.php'),
            require(__DIR__ . '/Web/yiisoft-view.php'),
            require(__DIR__ . '/Web/yiisoft-web.php'),
            require(__DIR__ . '/Web/yiisoft-yii-view.php'),
        );
    }
}
