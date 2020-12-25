<?php

declare(strict_types=1);

use App\Action\Index;
use Yiisoft\Router\Route;

return [
    Route::get('/', [Index::class, 'run'])->name('index'),
];
