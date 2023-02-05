<?php

namespace Tests\Feature;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDatabaseSeeder']);
    }

    public function testCanAccessTodosWithGetMethod()
    {
        $response = $this->get('todos');
        $response->assertStatus(200);
    }

    public function testCanAccessTodosCreateWithGetMethod()
    {
        $response = $this->get('todos/create');
        $response->assertStatus(200);
    }

    public function testCanAccessTodosWithPostMethod()
    {
        $todo = [
            'title' => 'TODOのタイトル。',
        ];
        $response = $this->post('todos', $todo);
        $response->assertStatus(302);
    }

    public function testCanAccessTodoWithGetMethod()
    {
        $todos = Todo::all();
        $todosArray = $todos->toArray();
        $todo = $todosArray[0];
        $endpoint = 'todos/' . $todo['id'];
        $response = $this->get($endpoint);
        $response->assertStatus(200);
    }

    public function testCanAccessTodoEditWithGetMethod()
    {
        $response = $this->get('todos/1/edit');
        $response->assertStatus(200);
    }

    public function testCanAccessTodoWithPutMethod()
    {
        $response = $this->put('todos/1');
        $response->assertStatus(200);
    }

    public function testCanAccessTodoWithDeleteMethod()
    {
        $response = $this->delete('todos/1');
        $response->assertStatus(200);
    }
}
