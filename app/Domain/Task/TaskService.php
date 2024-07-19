<?php

namespace App\Domain\Task;

use App\Models\Task;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(array $data): Task
    {
        return $this->taskRepository->create($data);
    }
}
