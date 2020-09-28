<?php

declare(strict_types=1);

namespace Yii;

final class ParamsConsole
{
    /**
     * Define console command customs console symphony.
     *
     * ```php
     * [
     *     'command' => App\Command::class
     * ]
     * ```
     *
     * @return array
     */
    public function getConsoleCommands(): array
    {
        return [
            'hellow' => \App\Command\Hellow::class
        ];
    }
}
