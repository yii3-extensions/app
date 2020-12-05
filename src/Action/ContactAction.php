<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\ContactForm;
use App\Service\ParameterService;
use App\Service\ViewService;
use App\Service\WebControllerService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yii\Extension\Service\MailerService;

final class ContactAction
{
    public function contact(
        ParameterService $app,
        ContactForm $form,
        MailerService $mailer,
        ServerRequestInterface $request,
        ViewService $view,
        WebControllerService $webController
    ): ResponseInterface {
        $body = $request->getParsedBody();
        $method = $request->getMethod();

        if (($method === 'POST') && $form->load($body) && $form->validate()) {
            $mailer->run(
                $app->get('emailFrom'),
                $form->getAttributeValue('email'),
                $form->getAttributeValue('subject'),
                '@mail',
                [ 'html' => 'contact'],
                [
                    'username' => $form->getAttributeValue('username'),
                    'body' => $form->getAttributeValue('body')
                ],
                $request->getUploadedFiles()
            );

            return
                $webController
                    ->withFlash(
                        'is-success',
                        'System mailer notification.',
                        'Thanks to contact us, we\'ll get in touch with you as soon as possible.'
                    )
                    ->redirectResponse('index');
        }

        return
            $view->renderWithLayout(
                'contact/contact',
                [
                    'form' => $form,
                ]
            );
    }
}
