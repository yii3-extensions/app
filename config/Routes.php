<?php

declare(strict_types=1);

use App\Action\AboutAction;
use App\Action\ContactAction;
use App\Action\IndexAction;
use Yiisoft\Router\Route;

return [
    Route::get('/', [IndexAction::class, 'index'])->name('index'),
    Route::get('/about', [AboutAction::class, 'about'])->name('about'),
    Route::methods(['GET', 'POST'], '/contact', [ContactAction::class, 'contact'])->name('contact'),
];
