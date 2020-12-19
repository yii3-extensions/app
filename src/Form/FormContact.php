<?php

declare(strict_types=1);

namespace App\Form;

use Yiisoft\Form\FormModel;
use Yiisoft\Validator\Rule\Email;
use Yiisoft\Validator\Rule\Required;

final class FormContact extends FormModel
{
    private string $username = '';
    private string $email = '';
    private string $subject = '';
    private string $body = '';
    private array $attachFiles = [];

    public function attributeLabels(): array
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'subject' => 'Subject',
            'body' => 'Body',
        ];
    }

    public function formName(): string
    {
        return 'ContactForm';
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function rules(): array
    {
        return [
            'username' => [new Required()],
            'email' => [new Required(), new Email()],
            'subject' => [new Required()],
            'body' => [new Required()],
        ];
    }
}
