<?php

declare(strict_types=1);

namespace App\Service;

use Yiisoft\Arrays\ArrayHelper;

/**
 * ParameterService provides a way to get application Parameter defined in config/params.php
 *
 * In order to use in a handler or any other place supporting auto-wired injection:
 *
 * ```php
 *
 * $params = [
 *      'admin' => [
 *          'email' => 'demo@example.com'
 *      ]
 * ];
 * ```
 *
 * ```php
 * public function actionIndex(ParameterService $ParameterService)
 * {
 *     $adminEmail = $ParameterService->get('admin.email', 'admin@example.com');
 *     // return demo@example.com or admin@example.com if search key not exists in ParameterService
 * }
 * ```
 */
final class ParameterService
{
    private array $parameters;

    public function __construct(array $data)
    {
        $this->parameters = $data;
    }

    /**
     * Returns a parameter defined in params.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return ArrayHelper::getValueByPath($this->parameters, $key, $default);
    }
}
