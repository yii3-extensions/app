<p align="center">
    <a href="https://github.com/yii3-extensions/app" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/121752654?s=200&v=4" height="100px">
    </a>
    <h1 align="center">Flowbite Application for YiiFramework v 3.0.</h1>
    <br>
</p>

<p align="center">
    <a href="https://github.com/yii3-extensions/app/actions" target="_blank">
        <img src="https://github.com/yii3-extensions/app/workflows/build/badge.svg" alt="Codeception">
    </a>
    <a href="https://codecov.io/gh/yii3-extensions/app" target="_blank">
        <img src="https://codecov.io/gh/yii3-extensions/app/branch/main/graph/badge.svg?token=MF0XUGVLYC" alt="Codecov">
    </a>
    <a href="https://github.com/yii3-extensions/app/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/yii3-extensions/app/actions/workflows/static.yml/badge.svg" alt="Psalm">
    </a>
    <a href="https://shepherd.dev/github/yii3-extensions/app" target="_blank">
        <img src="https://shepherd.dev/github/yii3-extensions/app/coverage.svg" alt="Psalm Coverage">
    </a>
    <a href="https://github.com/yii3-extensions/app/actions/workflows/ecs.yml" target="_blank">
        <img src="https://github.com/yii3-extensions/app/actions/workflows/ecs.yml/badge.svg" alt="Easy Coding Standard">
    </a>  
    <a href="https://github.styleci.io/repos/297125618?branch=main">
        <img src="https://github.styleci.io/repos/297125618/shield?branch=main" alt="StyleCI">
    </a>         
</p>

<p align="center">
    <a href="https://github.com/yii3-extensions/app" target="_blank">
        <img src="https://raw.githubusercontent.com/yii3-extensions/app/main/docs/image/home.jpeg" alt="home" >
    </a>
    <a href="https://github.com/yii3-extensions/app" target="_blank">
        <img src="https://raw.githubusercontent.com/yii3-extensions/app/main/docs/image/404.jpeg" alt="404" >
    </a>
</p>

## Installation

This package requires [npm](https://www.npmjs.com/) for [php-forge/foxy](https://www.github.com/php-forge/foxy), which
manages the installation of npm packages and resource compilation.

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

```shell
composer create-project --prefer-dist --stability=dev yii3-extensions/app <your directory>
cd <your directory>
composer update --prefer-dist --vvv
```

To launch development web server run:

```bash
composer run serve
```

Now you should be able to access the application through the URL printed to console. Usually it is http://localhost:8080.

## Directory structure

The application has the following structure directory:

```text
root
├── runtime                         Files generated during runtime.
├── src                             Application source code.
│    └── Framework                  Framework classes.
│        └── Asset                  Asset classes.
│        └── EventHandler           Event handler classes.
│        └── Handler                Handler classes.
│        └── resource               Resource files.
│            └── asset              Custom asset files.
│            └── layout             Layout files.
│            └── message            Message translation files.
│    └── UseCase                    Use case classes with vertical slices.
│        └── Hello                  Classes for function hello command.
│        └── Home                   Classes for function home page.
```

## Configuration, installation and usage

For complete instructions on how to configure, install and use this application demo, see the [docs](/docs/README.md).

## Testing

[Check the documentation testing](/docs/testing.md) to learn about testing.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)
