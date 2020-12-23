<?php

declare(strict_types=1);

namespace App\Action;

use App\Form\FormContact;
use App\Service\Parameter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yii\Extension\Service\ServiceMailer;
use Yii\Extension\Service\ServiceUrl;
use Yii\Extension\Service\ServiceView;
use Yiisoft\Router\UrlGeneratorInterface;

final class Contact
{
    public function run(
        Parameter $app,
        FormContact $form,
        ServerRequestInterface $request,
        ServiceMailer $serviceMailer,
        ServiceUrl $serviceUrl,
        ServiceView $serviceView,
        UrlGeneratorInterface $urlGenerator
    ): ResponseInterface {
        /** @var array $body */
        $body = $request->getParsedBody();
        $method = $request->getMethod();

        if (($method === 'POST') && $form->load($body) && $form->validate()) {
            $serviceMailer->run(
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

            return $serviceUrl->run('index');
        }

        return $serviceView->render(
            'contact/contact',
            ['action' => $urlGenerator->generate('contact'), 'form' => $form]
        );
    }
}
