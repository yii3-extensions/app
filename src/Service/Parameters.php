<?php

declare(strict_types=1);

namespace App\Service;

use Yiisoft\Arrays\ArrayHelper;

/**
 * Parameters provides a way to get application parameters defined in config/params.php
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
 * public function actionIndex(Parameters $parameters)
 * {
 *     $adminEmail = $parameters->get('admin.email', 'admin@example.com');
 *     // return demo@example.com or admin@example.com if search key not exists in parameters
 * }
 * ```
 */
final class Parameters
{
    private array $parameters;

    public function __construct(array $data)
    {
        $this->parameters = $data;
    }

    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return ArrayHelper::getValueByPath($this->parameters, $key, $default);
    }
}
