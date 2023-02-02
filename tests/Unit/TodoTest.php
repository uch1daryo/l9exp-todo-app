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

    public function testCanGetThreeRecordsFromTodoTable()
    {
        $todos = Todo::all();
        $this->assertEquals($todos->count(), 3);
    }

    public function testCanGetCorrectRecordDataFromTodoTable()
    {
        $todos = Todo::all();
        $todosArray = $todos->toArray();
        $todo = $todosArray[0];
        $this->assertSame(['id', 'title', 'created_at', 'updated_at'], array_keys($todo));
    }
}
