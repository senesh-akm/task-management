<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_be_create_task()
    {
        $task = Task::create([
            'title' => 'Task 1',
            'description' => 'This is test task',
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('tasks', ['title' => 'Task 1']);
    }
}
