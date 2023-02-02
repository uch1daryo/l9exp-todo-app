<?php

namespace Tests\Unit;

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

    public function testCanSelectThreeRecordsFromTodosTable()
    {
        $todos = Todo::all();
        $this->assertEquals($todos->count(), 3);
    }

    public function testCanSelectCorrectRecordDataFromTodosTable()
    {
        $todos = Todo::all();
        $todosArray = $todos->toArray();
        $todo = $todosArray[0];
        $this->assertSame(['id', 'title', 'created_at', 'updated_at'], array_keys($todo));
    }

    public function testCanInsertOneRecordToTodosTable()
    {
        $params = [
            'title' => 'INSERTテスト。',
        ];
        $todo = Todo::create($params);
        $this->assertDatabaseHas('todos', $params);
    }

    public function testCanUpdateOneRecordInTodosTable()
    {
        $params = [
            'title' => 'UPDATEテスト。',
        ];
        $todos = Todo::all();
        $todo = $todos[0];
        $todo->update($params);
        $this->assertDatabaseHas('todos', $params);
    }

    public function testCanDeleteOneRecordInTodosTable()
    {
        $todos = Todo::all();
        $todo = $todos[0];
        $todo->delete();
        $todos = Todo::all();
        $this->assertEquals($todos->count(), 2);
    }
}
