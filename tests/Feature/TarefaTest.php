<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TarefaTest extends TestCase
{
    use DatabaseMigrations;

    public function testSeSalvaTarefa()
    {
        $this->signIn();

        $user = factory('App\Tarefa')->make();
        $this->post(route('tarefas/tarefasStore'), $user->toArray())
            ->assertStatus(200);
    }
}
