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

if (isset($identity) && $identity->getId() !== null) {
    if ($app->get('app.nav.logged') !== []) {
        $menuItems = $app->get('app.nav.logged');
    }

    $label = '';

    foreach ($menuItems as $key => $item) {
        $label = strtr($item['label'], [
            '{logo}' => Html::img($aliases->get('@web/images/icon-avatar.png')),
            '{username}' => $identity->getIdentity()->username
        ]);

        if ($label !== '') {
            $menuItems[$key]['label'] = $label;
        }
    }
} else {
    $menuItems =  $app->get('app.nav.guest');
}
?>

<?= NavBar::begin($app->get('app.navBar.config'))->start() ?>

    <?= Nav::widget()
        ->currentPath($url->generate($urlMatcher->getCurrentRoute()->getName()))
        ->items($menuItems)
    ?>

<?= NavBar::end();
