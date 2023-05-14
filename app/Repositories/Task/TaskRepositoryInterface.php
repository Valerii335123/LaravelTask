<?php

namespace App\Repositories\Task;

use App\DTO\Task\TaskSearchDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TaskRepositoryInterface
{

    /**
     * @param TaskSearchDTO $searchDTO
     */
    public function searchByDTO(TaskSearchDTO $searchDTO): LengthAwarePaginator;
}