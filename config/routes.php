<?php

declare(strict_types=1);

use App\Action\About;
use App\Action\Contact;
use App\Action\Index;
use Yiisoft\Router\Route;

return [
    Route::get('/', [Index::class, 'run'])->name('index'),
    Route::get('/about', [About::class, 'run'])->name('about'),
    Route::methods(['GET', 'POST'], '/contact', [Contact::class, 'run'])->name('contact'),
];
