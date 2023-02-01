<?php

namespace Tests\Feature;

use Tests\TestCase;

class TodoTest extends TestCase
{
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
        $response = $this->post('todos');
        $response->assertStatus(200);
    }

    public function testCanAccessTodoWithGetMethod()
    {
        $response = $this->get('todos/1');
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
