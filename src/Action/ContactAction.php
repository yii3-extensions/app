<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\ContactForm;
use App\Service\MailerService;
use App\Service\ViewService;
use App\Service\WebControllerService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Router\UrlGeneratorInterface;

final class ContactAction
{
    public function contact(
        ContactForm $form,
        MailerService $mailer,
        UrlGeneratorInterface $url,
        ServerRequestInterface $request,
        ViewService $view,
        WebControllerService $webController
    ): ResponseInterface {
        $body = $request->getParsedBody();
        $method = $request->getMethod();

        if (($method === 'POST') && $form->load($body) && $form->validate()) {
            $mailer->run(
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
                    'action' => $url->generate('contact'),
                    'form' => $form,
                ]
            );
    }
}
