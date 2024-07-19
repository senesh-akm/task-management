<?php

namespace Tests\Unit;

use App\Domain\Task\TaskRepositoryInterface;
use App\Domain\Task\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class TaskServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $taskService;

    protected function setUp(): void
    {
        parent::setUp();

        $taskRepository = Mockery::mock(TaskRepositoryInterface::class);
        $taskRepository->shouldReceive('create')->andReturn(new \App\Models\Task([
            'title' => 'Test Task',
            'description' => 'This is a test task.',
            'status' => 'pending',
        ]));

        $this->taskService = new TaskService($taskRepository);
    }

    /** @test */
    public function it_creates_a_task()
    {
        $task = $this->taskService->createTask([
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'status' => 'pending',
        ]);

        $this->assertEquals('Test Task', $task->title);
    }

    protected function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }
}
