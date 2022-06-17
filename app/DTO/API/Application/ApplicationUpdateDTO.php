<?php

namespace App\DTO\API\Application;

class ApplicationUpdateDTO
{
    public function __construct(
        private string $status = 'Active',
        private int|null $responsible_id = null,
        private string|null $comment = null,
    ) {}

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getComment(): string|null
    {
        return $this->comment;
    }

    public function getResponsibleId(): int|null
    {
        return $this->responsible_id;
    }
}
