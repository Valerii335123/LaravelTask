<?php

namespace App\DTO\Task;

use App\Models\User;

class TaskSearchDTO
{
    /**
     * @param int $userId
     * @param string|null $title
     */
    public function __construct(
        public int $userId,
        public ?string $title
    ) {
    }
}