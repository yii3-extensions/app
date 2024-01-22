<?php

declare(strict_types=1);

use App\UseCase\Home\HomeAction;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;

return [
    Group::create('/{_language}')
        ->routes(
            Route::get('/')->action([HomeAction::class, 'run'])->name('home'),
        ),
];
