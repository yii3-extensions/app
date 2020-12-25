<?php

declare(strict_types=1);

use App\Command\Hello;
use App\Service\Parameter;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;

return [
    'app' => [
        'charset' => 'UTF-8',
        'emailFrom' => 'tester@example.com',
        'language' => 'en',
        'logo' => '/images/yii-logo.jpg',

        /** config widget nav */
        'nav' => [
            /**
            * Example menu config simple link, dropdown menu.
            *[
            *   'label' => 'Home',
            *   'url' => ['site/index']
            *],
            *[
            *   'label' => 'Dropdown',
            *   'items' => [
            *       ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
            *       ['label' => 'Level 2 - Dropdown A', 'url' => '#'],
            *       '<li class="dropdown-divider"></li>',
            *       '<li style="color:black;list-style-type: none">Dropdown Header</li>',
            *       ['label' => 'Level 3 - Dropdown B', 'url' => '#'],
            *       ['label' => 'Level 4 - Dropdown A', 'url' => '#'],
            *   ],
            *],
            */
            'guest' => [
                ['label' => 'About', 'url' => '/about'],
                ['label' => 'Contact', 'url' => '/contact']
            ],
            'logged' => [],
        ],

        /** config widget navBar */
        'navBar' => [
            'config' => [
                'brandLabel()' => ['My Project'],
                'brandImage()' => ['/images/yii-logo.jpg'],
                'itemsOptions()' => [['class' => 'navbar-end']],
                'options()' => [['class' => 'is-black', 'data-sticky' => '', 'data-sticky-shadow' => '']]                    ],
        ],

        'name' => 'My Project'
    ],

    'swiftmailer/swiftmailer' => [
        'SwiftSmtpTransport' => [
            'host' => 'smtp.example.com',
            'port' => 25,
            'encryption' => null,
            'username' => 'admin@example.com',
            'password' => ''
        ]
    ],

    'yii-extension/view-services' => [
        'defaultParameters' => [
            'app' => Reference::to(Parameter::class),
            'assetManager' => Reference::to(AssetManager::class),
            'url' => Reference::to(UrlGeneratorInterface::class),
            'urlMatcher' => Reference::to(UrlMatcherInterface::class),
        ],
        'viewParameters' => [
            'field' => Reference::to(Field::class),
        ]
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => dirname(__DIR__),
            '@assets' => '@root/public/assets',
            '@assetsUrl' => '/assets',
            '@avatars' => '@root/public/images/avatars',
            '@mail' => '@root/resources/mail',
            '@npm' => '@root/node_modules',
            '@resources' => '@root/resources',
            '@runtime' => '@root/runtime',
            '@vendor' => '@root/vendor',
            '@layout' => '@root/resources/views/layout',
            '@views' => '@root/resources/views',
        ],
    ],

    'yiisoft/form' => [
        'fieldConfig' => [
            'errorOptions()' => [['class' => 'help is-danger has-text-left mt-0 mb-2']],
            'errorCssClass()' => ['is-danger'],
            'successCssClass()' => ['is-success'],
            'inputCssClass()' => ['input field mb-1'],
            'labelOptions()' => [['label' => '']],
        ]
    ],

    'yiisoft/log-target-file' => [
        'fileTarget' => [
            'file' => '@runtime/logs/app.txt'
        ]
    ],

    'yiisoft/mailer' => [
        'composer' => [
            'composerView' => '@resources/mail'
        ],
        'fileMailer' => [
            'fileMailerStorage' => '@runtime/mail'
        ],
        'writeToFiles' => false,
    ],

    'yiisoft/view' => [
        'basePath' => '@views',
    ],

    'yiisoft/yii-console' => [
        'commands' => [
            'hello' => Hello::class,
        ]
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
