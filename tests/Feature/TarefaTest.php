<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TarefaTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testa se ao gravar uma nova tarefa, retorna o status HTTP e a página corretos e checa se armazenou corretamente no banco pelo email.
     *
     * @return void
     */
    public function testSeSalvaTarefa()
    {
        $this->signIn();

        $tarefa = factory('App\Tarefa')->make();
        $this->post(route('tarefas/tarefasStore'), $tarefa->toArray())
            ->assertStatus(200)
            ->assertSee('Você conseguiu gravar uma tarefa!');
        $this->assertDatabaseHas('tarefas', ['titulo'=> $tarefa->titulo]);
    }

    /**
     * Testa se, ao atualizar uma tarefa, retorna o status HTTP e a página corretos e checa se armazenou corretamente no banco pelo email.
     *
     * @return void
     */
    public function testSeAtualizaTarefa()
    {
        $this->signIn();

        $tarefa = factory('App\Tarefa')->create();
        $this->put(route('tarefas/tarefasUpdate', $tarefa->id), $tarefa->toArray())
            ->assertStatus(200)
            ->assertSee('Você conseguiu atualizar uma tarefa!');
        $this->assertDatabaseHas('tarefas', ['titulo'=> $tarefa->titulo]);
    }

    /**
     * Testa se, ao deletar uma tarefa, retorna o status HTTP correto, apaga a tarefa na view e no banco de dados e verifica se existe um soft delete para ele.
     *
     * @return void
     */
    public function testSeDeletaTarefa()
    {
        $this->signIn();

        $tarefa = factory('App\Tarefa')->create();
        $this->delete(route('tarefas/tarefasDelete', $tarefa->id), $tarefa->toArray())
            ->assertStatus(200)
            ->assertDontSee($tarefa->titulo);
        $this->assertSoftDeleted(
            'tarefas',
            ['titulo' => $tarefa->titulo]
        );
    }

    /**
     * Testa se, ao exibir uma tarefa, retorna o status HTTP correto e mostra o título da tarefa na view.
     *
     * @return void
     */
    public function testSeMostraTarefa()
    {
        $this->signIn();

        $tarefa = factory('App\Tarefa')->create();

        $this->get(route('tarefas/tarefasShow', $tarefa->id), $tarefa->toArray())
        ->assertStatus(200)
        ->assertSee($tarefa->titulo);
    }

    /**
     * Testa se, ao exibir uma lista de tarefas, retorna o status HTTP correto e, deverá ser implementada uma forma de checar os dados na view.
     *
     * @return void
     */
    public function testSeListaTarefas()
    {
        $this->signIn();

        $tarefa = factory('App\Tarefa', 3)->create();

        $this->get(route('tarefas/tarefasList'), $tarefa->toArray())
        ->assertStatus(200);
    }
}
