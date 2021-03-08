<?php

declare(strict_types=1);

use Yii\Extension\Service\ServiceParameter;
use Yiisoft\Yii\Bulma\Nav;
use Yiisoft\Yii\Bulma\NavBar;
use Yiisoft\Html\Html;
use Yiisoft\Router\UrlMatcherInterface;

/**
 * @var string $currentUrl
 * @var array $menuItems
 * @var ServiceParameter $serviceParameter
 * @var UrlMatcherInterface $urlMatcher
 */

$config = [
    'brandLabel()' => ['My Project'],
    'brandImage()' => ['/images/yii-logo.jpg'],
    'itemsOptions()' => [['class' => 'navbar-end']],
    'options()' => [['class' => 'is-black']],
];
$currentUrl = '';
$menuItems =  [];

if ($urlMatcher->getCurrentUri() !== null) {
    $currentUrl = $urlMatcher->getCurrentUri()->getPath();
}

?>

<?= NavBar::widget($config)->begin() ?>

    <?= Nav::widget()
        ->currentPath($currentUrl)
        ->items($menuItems)
    ?>

<?= NavBar::end();
