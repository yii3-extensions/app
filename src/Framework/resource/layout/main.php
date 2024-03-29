<?php

declare(strict_types=1);

use App\{ApplicationParameters, Framework\Asset\AppAsset};
use UIAwesome\Html\{Document\Body, Document\Html, Group\Div, Semantic\Header};
use Yiisoft\{Assets\AssetManager, View\WebView};

/**
 * @var ApplicationParameters $app
 * @var AssetManager $assetManager
 * @var string $content
 * @var WebView $this
 */
$assetManager->register(AppAsset::class);

$this->addCssFiles($assetManager->getCssFiles());
$this->addCssStrings($assetManager->getCssStrings());
$this->addJsFiles($assetManager->getJsFiles());
$this->addJsStrings($assetManager->getJsStrings());
$this->addJsVars($assetManager->getJsVars());
?>

<?php $this->beginPage()?>
    <!DOCTYPE html>
    <?= Html::widget()->lang($app->translator->getLocale())->begin() ?>
        <?= $this->render('_head') ?>
        <?php $this->beginBody() ?>
            <?= Body::widget()
                ->class('content flex flex-col h-[100vh] min-h-[100vh] bg-gray-100 dark:bg-gray-500 theme-loading')
                ->content(
                    Header::widget()->content($this->render('component/menu')),
                    Div::widget()
                        ->class('flex-grow flex flex-col justify-center')
                        ->content(
                            Div::widget()
                                ->class('h-full flex flex-col justify-center')
                                ->content($content)
                        ),
                    $this->render('_footer')
                ) ?>
        <?php $this->endBody() ?>
    <?= Html::end() ?>
<?php $this->endPage();
