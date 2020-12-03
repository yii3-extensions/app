<?php

declare(strict_types=1);

use Yiisoft\Form\Widget\Field;

/** @var array $params */

return [
    Field::class => static function () {
        $fieldConfig = [
            'labelOptions()' => [['label' => '']],
            'inputOptions()' => [['class' => 'field input']],
            'errorOptions()' => [['class' => 'has-text-left has-text-danger is-italic']],
            'hintOptions()' => [['class' => 'has-text-left is-size-7']],
        ];

        return Field::Widget($fieldConfig);
    }
];
