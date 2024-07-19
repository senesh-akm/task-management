<?php

namespace App\Http\Controllers;

use App\Domain\Task\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function store(Request $request)
    {
        $task = $this->taskService->createTask($request->all());

        return response()->json($task, 201);
    }
}
