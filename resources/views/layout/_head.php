<?php

declare(strict_types=1);

/**
 * @var App\ApplicationParameters $app
 * @var string $csrf
 */

use Yiisoft\Html\Html;

?>

<head>
    <meta charset=<?= $app->get('app.charset') ?>>
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name="viewport" content = "width=device-width, initial-scale=1">
    <meta name="csrf" content = <?= $csrf ?>>

    <title><?= Html::encode($this->getTitle()) ?></title>

    <?php $this->head() ?>
</head>
