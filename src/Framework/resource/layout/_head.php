<?php

declare(strict_types=1);

use App\ApplicationParameters;
use UIAwesome\Html\{Document\Head, Metadata\Meta, Metadata\Title};
use Yiisoft\{Csrf\CsrfTokenInterface, View\WebView};

/**
 * @var CsrfTokenInterface $csrfToken
 * @var ApplicationParameters $app
 * @var WebView $this
 */
?>

<?= Head::widget()->begin() ?>
    <?= Meta::widget()->name('_csrf')->content($csrfToken->getValue()) ?>
    <?= Meta::widget()->charset($app->charset) ?>
    <?= Meta::widget()->name('viewport')->content('width=device-width, initial-scale=1') ?>
    <?= Meta::widget()->name('description')->content($app->description) ?>
    <?= Title::widget()->content($this->getTitle()) ?>

    <?php $this->head() ?>
<?= Head::end();
