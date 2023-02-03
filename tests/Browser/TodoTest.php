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
                    ->assertSee('TODO 新規登録')
                    ->screenshot('todos_index');
        });
    }

    public function testCanMoveFromIndexPageToCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos')
                    ->clickLink('TODO 新規登録')
                    ->assertPathIs('/todos/create');
        });
    }

    public function testCanSeeTodosCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/create')
                    ->assertTitleContains('create')
                    ->assertSee('TODO 新規登録')
                    ->assertSee('タイトル')
                    ->assertSee('登録')
                    ->screenshot('todos_create');
        });
    }

    public function testCanRegisterAtCreatePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/create')
                    ->type('title', '何かしらのやるべきこと')
                    ->press('登録')
                    ->assertSee('何かしらのやるべきこと')
                    ->screenshot('register_todo');
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
