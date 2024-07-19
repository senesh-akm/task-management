<?php

namespace App\Domain\Task;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $data): Task
    {
        return Task::create($data);
    }
}
