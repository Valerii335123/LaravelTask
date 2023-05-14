<?php

namespace App\Repositories\Task;

use App\DTO\Task\TaskSearchDTO;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @param TaskSearchDTO $searchDTO
     * @return LengthAwarePaginator
     */
    public function searchByDTO(TaskSearchDTO $searchDTO): LengthAwarePaginator
    {
        return Task::whereUserId($searchDTO->userId)
            ->where('title', 'like', "%$searchDTO->title%")
            ->paginate();
    }
}