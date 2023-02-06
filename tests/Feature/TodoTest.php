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
        $todos = Todo::all();
        $todosArray = $todos->toArray();
        $todo = $todosArray[0];
        $endpoint = 'todos/' . $todo['id'] . '/edit';
        $response = $this->get($endpoint);
        $response->assertStatus(200);
    }

    public function testCanAccessTodoWithPutMethod()
    {
        $todos = Todo::all();
        $todosArray = $todos->toArray();
        $todo = $todosArray[0];
        $endpoint = 'todos/' . $todo['id'];
        $params = [
            'title' => 'TODOのタイトル。',
        ];
        $response = $this->get($endpoint, $params);
        $response->assertStatus(200);
    }

    public function testCanAccessTodoWithDeleteMethod()
    {
        $todos = Todo::all();
        $todosArray = $todos->toArray();
        $todo = $todosArray[0];
        $endpoint = 'todos/' . $todo['id'];
        $response = $this->delete($endpoint);
        $response->assertStatus(302);
    }
}
