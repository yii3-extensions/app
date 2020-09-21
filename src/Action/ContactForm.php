<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\Contact;
use App\Service\Mailer;
use App\Service\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use Yiisoft\Router\UrlGeneratorInterface;

final class ContactForm
{
    public function contact(
        Contact $form,
        DataResponseFactoryInterface $responseFactory,
        Mailer $mailer,
        UrlGeneratorInterface $url,
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

            return $responseFactory
                ->createResponse(302)
                ->withHeader(
                    'Location',
                    $url->generate('index')
                );
        }

        return $view->renderWithLayout(
            'contact/contact',
            [
                'form' => $form
            ]
        );
    }
}
