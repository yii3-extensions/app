<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\FormContact;
use App\Service\Parameter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yii\Extension\Service\MailerService;
use Yii\Extension\Service\ServiceFlashMessage;
use Yii\Extension\Service\ServiceUrl;
use Yii\Extension\Service\ServiceView;

final class Contact
{
    public function run(
        Parameter $app,
        FormContact $form,
        MailerService $mailer,
        ServerRequestInterface $request,
        ServiceFlashMessage $serviceFlashMessage,
        ServiceUrl $serviceUrl,
        ServiceView $serviceView
    ): ResponseInterface {
        /** @var array $body */
        $body = $request->getParsedBody();
        $method = $request->getMethod();

        if (($method === 'POST') && $form->load($body) && $form->validate()) {
            $mailer->run(
                (string) $app->get('emailFrom'),
                $form->getEmail(),
                $form->getSubject(),
                '@mail',
                [ 'html' => 'contact'],
                [
                    'username' => $form->getUsername(),
                    'body' => $form->getBody(),
                ],
                $request->getUploadedFiles(),
            );

            $serviceFlashMessage->run(
                'success',
                'System mailer notification.',
                'Thanks to contact us, we\'ll get in touch with you as soon as possible.',
            );

            return $serviceUrl->run('index');
        }

        return $serviceView->render('contact/contact', ['form' => $form]);
    }
}
