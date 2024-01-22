<?php

declare(strict_types=1);

use App\ApplicationParameters;
use PHPForge\Html\Head;
use PHPForge\Html\Meta;
use PHPForge\Html\Title;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\View\WebView;

/**
 * @var CsrfTokenInterface $csrfToken
 * @var ApplicationParameters $app
 * @var WebView $this
 */
?>

<?= Head::widget()->begin() ?>
    <?= Meta::widget()->content('_csrf', $csrfToken->getValue()) ?>
    <?= Meta::widget()->charset($app->charset) ?>
    <?= Meta::widget()->content('viewport', 'width=device-width, initial-scale=1') ?>
    <?= Meta::widget()->content('description', $app->description) ?>

    <?= Title::widget()->content($this->getTitle()) ?>

    <?php $this->head() ?>
<?= Head::end();
