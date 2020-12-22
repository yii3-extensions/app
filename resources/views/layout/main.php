<?php

declare(strict_types=1);

/**
 * @var App\ApplicationParameters $app
 * @var Yiisoft\Assets\AssetManager $assetManager
 * @var string $csrf
 * @var string $content
 */

use App\Asset\App;
use Yii\Extension\Widget\FlashMessage;

$assetManager->register([
    App::class
]);

$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang = <?= $app->get('app.language') ?>>

        <?= $this->render('_head', ['app' => $app, 'csrf' => $csrf]) ?>

        <?php $this->beginBody() ?>

            <body>

                <section class="hero is-fullheight is-light">

                    <div class="hero-head">
                        <header class = <?= (isset($identity) && $identity->getId() !== null)
                            ? "navbar" : "has-background-black" ?>>
                            <?= $this->render('_menu', ['app' => $app, 'url' => $url, 'urlMatcher' => $urlMatcher]) ?>
                        </header>
                        <div>
                            <?= FlashMessage::widget() ?>
                        </div>
                    </div>

                    <div class="hero-body is-light">
                        <div class="container has-text-centered">
                            <?= $content ?>
                        </div>
                    </div>

                    <div class="hero-footer has-background-black">
                        <?= $this->render('_footer') ?>
                    </div>

                </section>

            </body>

        <?php $this->endBody() ?>

    </html>

<?php $this->endPage();
