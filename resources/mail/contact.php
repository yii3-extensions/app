<?php

declare(strict_types=1);

/**
 * @var string $name
 * @var string $content
 */

use Yiisoft\Html\Html;

?>

<?= Html::encode($params['body']) ?>

<p><?= Html::encode($params['username']) ?></p>
