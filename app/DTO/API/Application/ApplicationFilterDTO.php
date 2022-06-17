<?php

namespace App\DTO\API\Application;

class ApplicationFilterDTO
{
    public function __construct(
        private string|null $status,
        private string|null $created_at,
    ) {}

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
}
