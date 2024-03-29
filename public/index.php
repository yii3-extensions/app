<?php

declare(strict_types=1);

use Yiisoft\Yii\Runner\Http\HttpApplicationRunner;

require_once dirname(__DIR__) . '/autoload.php';

if (isset($_ENV['YII_ENV'])) {
    defined('YII_ENV') || define('YII_ENV', $_ENV['YII_ENV']);
} else {
    defined('YII_ENV') || define('YII_ENV', 'prod');
}

if (getenv('YII_C3')) {
    $c3 = dirname(__DIR__) . '/c3.php';
    if (file_exists($c3)) {
        require_once $c3;
    }
}

/**
 * @psalm-var string $_SERVER['REQUEST_URI']
 */
// PHP built-in server routing.
if (PHP_SAPI === 'cli-server') {
    // Serve static files as is.
    /** @psalm-suppress MixedArgument */
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file(__DIR__ . $path)) {
        return false;
    }

    // Explicitly set for URLs with dot.
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

// Run HTTP application runner
$runner = new HttpApplicationRunner(
    rootPath: dirname(__DIR__),
    debug: (bool) $_ENV['YII_DEBUG'],
    checkEvents: (bool) $_ENV['YII_DEBUG'],
    environment: $_ENV['YII_ENV'],
);
$runner->run();
