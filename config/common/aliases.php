<?php

declare(strict_types=1);

return [
    '@root' => dirname(__DIR__, 2),
    '@assets' => '@root/public/assets',
    '@assetsUrl' => '@baseUrl/assets',
    '@baseUrl' => '/',
    '@messages' => '@resource/messages',
    '@npm' => '@root/node_modules',
    '@public' => '@root/public',
    '@resource' => '@root/src/Framework/resource',
    '@runtime' => '@root/runtime',
    '@vendor' => '@root/vendor',
];
