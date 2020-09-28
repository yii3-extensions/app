<?php

declare(strict_types=1);

namespace Yii;

use App\Action\About;
use App\Action\ContactForm;
use App\Action\Index;
use Yiisoft\Router\Route;

final class Routes
{
    public function getRoutes(): array
    {
        return [
            Route::get('/', [Index::class, 'index'])->name('index'),
            Route::get('/about', [About::class, 'about'])->name('about'),
            Route::methods(['GET', 'POST'], '/contact', [ContactForm::class, 'contact'])->name('contact')
        ];
    }
}
