<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\Contact;
use App\Service\Mailer;
use App\Service\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ContactForm
{
    public function contact(
        Contact $form,
        Mailer $mailer,
        ServerRequestInterface $request,
        View $view
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

            $view->addFlash(
                'is-success',
                'System mailer notification.',
                'Thanks to contact us, we\'ll get in touch with you as soon as possible.'
            );

            return $view->redirect('index');
        }

        return $view->renderWithLayout(
            'contact/contact',
            [
                'form' => $form
            ]
        );
    }
}
