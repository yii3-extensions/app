<?php

declare(strict_types=1);

namespace Config\Web;

use Yiisoft\Csrf\MaskedCsrfToken;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Csrf\Synchronizer\Generator\RandomCsrfTokenGenerator;
use Yiisoft\Csrf\Synchronizer\Storage\SessionCsrfTokenStorage;
use Yiisoft\Csrf\Synchronizer\SynchronizerCsrfToken;
use Yiisoft\Csrf\Hmac\IdentityGenerator\SessionCsrfTokenIdentityGenerator;
use Yiisoft\Csrf\Hmac\HmacCsrfToken;
use Yiisoft\Factory\Definitions\Reference;

$secretKey = '';
$algorithm = 'sha256';
$lifetime = null;

return [
    CsrfTokenInterface::class => [
        '__class' => MaskedCsrfToken::class,
        '__construct()' => [
            'token' => Reference::to(SynchronizerCsrfToken::class),
        ],
    ],

    SynchronizerCsrfToken::class => [
        '__construct()' => [
            'generator' => Reference::to(RandomCsrfTokenGenerator::class),
            'storage' => Reference::to(SessionCsrfTokenStorage::class),
        ],
    ],

    HmacCsrfToken::class => [
        '__construct()' => [
            'identityGenerator' => Reference::to(SessionCsrfTokenIdentityGenerator::class),
            'secretKey' => $secretKey,
            'algorithm' => $algorithm,
            'lifetime' => $lifetime,
        ],
    ],
];
