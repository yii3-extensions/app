<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\ContactForm;
use App\Service\ParameterService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yii\Extension\Service\MailerService;
use Yii\Extension\Service\UrlService;
use Yii\Extension\Service\ViewService;
use Yiisoft\Session\Flash\Flash;

final class ContactAction
{
    public function contact(
        ParameterService $app,
        ContactForm $form,
        Flash $flash,
        MailerService $mailer,
        ServerRequestInterface $request,
        UrlService $urlService,
        ViewService $viewService
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

            $flash->add(
                'success',
                [
                    'header' => 'System mailer notification.',
                    'body' => 'Thanks to contact us, we\'ll get in touch with you as soon as possible.'
                ],
            );

            return $urlService->redirectResponse('index');
        }

        return $viewService->render('contact/contact', ['form' => $form]);
    }
}
