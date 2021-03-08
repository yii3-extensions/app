<?php

declare(strict_types=1);

use App\Asset\App;
use Yii\Extension\Widget\FlashMessage;
use Yii\Extension\Service\ServiceParameter;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Html\Html;
use Yiisoft\Router\UrlMatcherInterface;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var ServiceParameter $serviceParameter
 * @var UrlMatcherInterface $urlMatcher
 */

$assetManager->register([
    App::class
]);

$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en-US">

        <?= $this->render('_head', ['csrf' => $csrf]) ?>

        <?php $this->beginBody() ?>

            <body>

                <section class="hero is-fullheight is-light">

                    <div class="hero-head">
                        <header class = <?= (isset($identity) && $identity->getId() !== null)
                            ? "navbar" : "has-background-black" ?>>
                            <?= $this->render(
                                '_menu',
                                ['urlMatcher' => $urlMatcher]
                            ) ?>
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
