<?php

declare(strict_types=1);

/**
 * @var App\Form\ContactForm $form
 * @var Yiisoft\Form\Widget\Field $field
 * @var Yiisoft\Router\UrlGeneratorInterface $url
 * @var string|null $csrf
 */

use Yiisoft\Form\Widget\Field;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;

$fieldConfig = [
    'inputCssClass()' => ['form-control input field'],
    'labelOptions()' => [['label' => '']],
    'errorOptions()' => [['class' => 'has-text-left has-text-danger is-italic']],
];

?>

<div class="column is-4 is-offset-4">

    <p class="subtitle has-text-black">
        Please fill out the following to Contact.
    </p>

    <?= Form::widget()
        ->action($url->generate('contact'))
        ->options(
            [
                'id' => 'form-contact',
                'csrf' => $csrf,
                'enctype' => 'multipart/form-data',
            ]
        )
        ->begin() ?>

        <?= Field::Widget($fieldConfig)->config($form, 'username') ?>
        <?= Field::Widget($fieldConfig)->config($form, 'email') ?>
        <?= Field::Widget($fieldConfig)->config($form, 'subject') ?>
        <?= Field::Widget($fieldConfig)->config($form, 'body')
            ->textArea(['class' => 'form-control textarea', 'rows' => 2]) ?>
        <?= Field::Widget($fieldConfig)->config($form, 'attachFiles')
            ->inputCssClass('file-input')
            ->template(
                '<div class="file is-small is-link has-name">
                    <label class="file-label">
                        {input}
                        <span class="file-cta">
                            <span class="file-icon"><i class="fas fa-upload"></i></span>
                            <span class="file-label">Choose a file…</span>
                        </span>
                        <span class="file-name">Please select a file.</span>
                    </label>
                </div>'
            )
            ->fileInput(
                ['type' => 'file', 'multiple' => 'multiple', 'name' => 'attachFiles[]'],
                true,
            ) ?>

        <?= Html::submitButton(
            'Send mail ' . html::tag('i', '', ['class' => 'fas fa-share', 'aria-hidden' => 'true']),
            [
                'class' => 'button is-block is-info is-fullwidth has-margin-top-15',
                'id' => 'contact-button',
                'tabindex' => '5'
            ]
        ) ?>

    <?= Form::end() ?>

</div>
