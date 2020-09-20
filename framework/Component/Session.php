<?php

declare(strict_types=1);

namespace Yii\Component;

use Yiisoft\Csrf\TokenStorage\CsrfTokenStorageInterface;
use Yiisoft\Csrf\TokenStorage\SessionCsrfTokenStorage;
use Yiisoft\Session\Session as YiiSession;
use Yiisoft\Session\SessionInterface;

return [
    SessionInterface::class => static fn () => new YiiSession(
        ['cookie_secure' => 0],
        null
    ),
    CsrfTokenStorageInterface::class => SessionCsrfTokenStorage::class,
];
