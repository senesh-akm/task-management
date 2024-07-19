<?php

namespace App\Http\Controllers;

use App\Domain\Task\TaskService;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // protected $taskService;

    // public function __construct(TaskService $taskService)
    // {
    //     $this->taskService = $taskService;
    // }

    // public function store(Request $request)
    // {
    //     $task = $this->taskService->createTask($request->all());

    //     return response()->json($task, 201);
    // }

    public function index()
    {
        // Return a list of tasks
        return Task::all();
    }

    public function store(Request $request)
    {
        // Validate and create a new task
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        return Task::create($validated);
    }

    public function show(Task $task)
    {
        // Return a single task
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        // Validate and update the task
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
        ]);

        $task->update($validated);

        return $task;
    }

    public function destroy(Task $task)
    {
        // Delete the task
        $task->delete();

        return response()->noContent();
    }
}
