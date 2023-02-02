<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TodoTest extends DuskTestCase
{
    public function testCanSeeTodosIndexPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos')
                    ->assertTitleContains('index')
                    ->screenshot('todos_index');
        });
    }

    public function testCanSeeTodosCreatePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/create')
                    ->assertTitleContains('create')
                    ->screenshot('todos_create');
        });
    }

    public function testCanSeeTodosShowPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/1')
                    ->assertTitleContains('show')
                    ->screenshot('todos_show');
        });
    }

    public function testCanSeeTodosEditPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('todos/1/edit')
                    ->assertTitleContains('edit')
                    ->screenshot('todos_edit');
        });
    }
}
