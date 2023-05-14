<?php

namespace App\Enums\Task;

use App\Traits\Enums\EnumToArrayTrait;

enum TaskStatusType: string
{
    use EnumToArrayTrait;

    case NEW = 'new';
    case TODO = "todo";
    case DONE = "done";
    case IN_PROGRESS = 'in_progress';
}
