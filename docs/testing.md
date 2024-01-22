# Testing

## Checking dependencies

This package uses [composer-require-checker](https://github.com/maglnet/ComposerRequireChecker) to check if all dependencies are correctly defined in `composer.json`.

To run the checker, execute the following command:

```shell
composer run check-dependencies
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
composer run psalm
```

## Acceptance, Functional and Unit tests

The code is tested with [Codeception](https://codeception.com/). To run tests:

- Apply migration:

```shell
YII_ENV=tests ./yii m:u -n
```

- Run tests:

```shell
YII_ENV=tests vendor/bin/codecept run --env php-builtin
```
