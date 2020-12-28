<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Yii application template with bulma css framework</h1>
    <br>
</p>

[![Total Downloads](https://img.shields.io/packagist/dt/yii-extension/app-bulma)](https://packagist.org/packages/yii-extension/app-bulma)
[![build](https://github.com/yii-extension/app-bulma/workflows/build/badge.svg)](https://github.com/yii-extension/app-bulma/actions)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yii-extension/app-bulma/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yii-extension/app-bulma/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/yii-extension/app-bulma/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yii-extension/app-bulma/?branch=master)
[![static analysis](https://github.com/yii-extension/app-bulma/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/app-bulma/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/app-bulma/coverage.svg)](https://shepherd.dev/github/yii-extension/app-bulma)

<p align="center">
    <a href="https://github.com/yii-extension/app-bulma" target="_blank">
        <img src="https://lh3.googleusercontent.com/0NUwRte-ZTFEICMVHaJy5goeSubb06ocqSHeU0e3OyaC6OQLM04pgTCirb7OZH8HDvAhZjEU6psRiiB-LBHvKE9GAVwQNL0Cw6OiJBodr4vud31ZzAPWR2fUszMTsCRQlu-Ppctsqw=w2400">
    </a>
</p>

Yii application template for Yii 3 is best for rapidly creating projects.

## Directory structure

      config/             contains application configurations
      storage/view        contains layout files for the web application
      storage/view        contains view files for the web application
      src/                application directory
          Action          contains action classes
          Asset           contains assets classes
          Command         contains command console classes
          Handler         contains handlers classes

## Installation

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```shell
composer create-project --prefer-dist --stability dev yii-extension/app-bulma <your project>
```

Now you should be able to access the application through the following URL, assuming `app` is the directory
directly under the `public` root.

## Configuring your application

All the configuration is in the `config directory` of the `application`.

## Using PHP built-in server

```shell
php -S 127.0.0.1:8080 -t public
```

## Wait till it is up, then open the following URL in your browser

~~~
http://localhost:8080
~~~

## Run command console

```shell
vendor/bin/yii
```

## Codeception testing

The package is tested with [Codeception](https://github.com/Codeception/Codeception). To run tests:

```shell
php -S 127.0.0.1:8080 -t public > yii.log 2>&1 &
vendor/bin/codecept run
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/docs). To run static analysis:

```shell
./vendor/bin/psalm
```

## License

The Yii application template with bulma css framework for Yii Packages is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).
