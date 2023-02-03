<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TodoTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDatabaseSeeder']);
    }

    public function testCanSeeTodosIndexPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos')
                    ->assertTitleContains('index')
                    ->assertSee('TODO 一覧')
                    ->assertSee('ID')
                    ->assertSee('タイトル')
                    ->assertSee('作成')
                    ->assertSee('更新')
                    ->assertSee('詳細')
                    ->assertSee('編集')
                    ->assertSee('削除')
                    ->screenshot('todos_index');
        });
    }

    public function testCanSeeTodosCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/create')
                    ->assertTitleContains('create')
                    ->screenshot('todos_create');
        });
    }

    public function testCanSeeTodosShowPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/1')
                    ->assertTitleContains('show')
                    ->screenshot('todos_show');
        });
    }

    public function testCanSeeTodosEditPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/1/edit')
                    ->assertTitleContains('edit')
                    ->screenshot('todos_edit');
        });
    }
}
