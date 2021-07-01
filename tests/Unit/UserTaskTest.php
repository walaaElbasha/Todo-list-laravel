<?php

namespace Tests\Unit;
use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserTaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_create_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $data = [
            'name' => "task1",
            'user_id' => $user->id,
        ];
        $this->post('tasks.store', $data)->assertStatus(201);


    }

    public function test_retrieve_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $task1 = Task::factory()->create(['user_id' => $user->id, 'name' => 'TASK1']);
        $task2 = Task::factory()->create(['user_id' => $user->id, 'name' => 'TASK2']);
        $response = $this->get('tasks.index')->assertStatus(200);
        $data = $response->baseResponse->original["data"];
        $this->assertEquals(2, count($data));

    }
    public function test_delete_task()
    {
        $user =User::factory()->create();
        $this->actingAs($user);
        $task=  Task:: factory()->create(['user_id' => $user->id]);
        $this->delete(route('tasks.delete', $task->id))->assertStatus(204);
    }
    public function test_update_task()
    {
        $user = User:: factory()->create();
        $this->actingAs($user);
        $task = Task::factory()->create(['user_id' => $user->id]);
        $data = [
            'name' => "task updated",
            'user_id' => $user->id,
        ];
        $this->put(route('tasks.update', $task->id), $data)->assertStatus(200);
    }
}
