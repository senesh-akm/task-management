<?php

namespace App\Domain\Task;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;
}
