<?php

namespace App\DTO\API\Application;

class ApplicationCreateDTO
{
    public function __construct(
        private string $name,
        private string $email,
        private string $message,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
