<?php

declare(strict_types=1);

/**
 * @var App\ApplicationParameters $app
 * @var Yiisoft\Yii\Web\User\User $user
 * @var array $menuItems
 */

use Yiisoft\Yii\Bulma\Nav;
use Yiisoft\Yii\Bulma\NavBar;
use Yiisoft\Html\Html;

$menuItems =  $app->get('nav.guest');
$currentUrl = '';

if ($urlMatcher->getCurrentUri() !== null) {
    $currentUrl = $urlMatcher->getCurrentUri()->getPath();
}

?>

<?= NavBar::widget($app->get('navBar.config'))->begin() ?>

    <?= Nav::widget()
        ->currentPath($currentUrl)
        ->items($menuItems)
    ?>

<?= NavBar::end();
