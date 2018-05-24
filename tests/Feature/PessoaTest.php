<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PessoaTest extends TestCase
{
    use DatabaseMigrations;
    //use DatabaseRefresh;
    //use DatabaseTransactions;

    /**
     * Testa se, ao salvar um novo contato, retorna o status HTTP e a página corretos e checa se armazenou corretamente no banco pelo email.
     *
     * @return void
     */
    public function testSeSalvaPessoa()
    {
        $this->signIn();

        $pessoa = factory('App\Pessoa')->make();

        $this->post(route('pessoas/pessoasStore'), $pessoa->toArray())
            ->assertStatus(200)
            ->assertSee('Você conseguiu gravar um Contato!');

        $this->assertDatabaseHas('pessoas', ['email'=> $pessoa->email]);
    }

    /**
     * Testa se, ao atualizar um contato, retorna o status HTTP e a página corretos e checa se armazenou corretamente no banco pelo email.
     *
     * @return void
     */
    public function testSeAtualizaPessoa()
    {
        $this->signIn();

        $pessoa = factory('App\Pessoa')->create();
        $this->put(route('pessoas/pessoasUpdate', $pessoa->id), $pessoa->toArray())
            ->assertStatus(200)
            ->assertSee('Você conseguiu atualizar um Contato!');
        $this->assertDatabaseHas('pessoas', ['email'=> $pessoa->email]);
    }

    /**
     * Testa se, ao deletar um contato, retorna o status HTTP correto, apaga o contatos na view e no banco de dados existe um soft delete para ele.
     *
     * @return void
     */
    public function testSeDeletaPessoa()
    {
        $this->signIn();

        $pessoa = factory('App\Pessoa')->create();
        $this->delete(route('pessoas/pessoasDelete', $pessoa->id), $pessoa->toArray())
            ->assertStatus(200)
            ->assertDontSee($pessoa->nome);
        $this->assertSoftDeleted(
            'pessoas',
            ['email' => $pessoa->email]
        );
    }

    /**
     * Testa se, ao exibir um contato, retorna o status HTTP correto e mostra o nome do contato na view.
     *
     * @return void
     */
    public function testSeMostraPessoa()
    {
        $this->signIn();

        $pessoa = factory('App\Pessoa')->create();

        $this->get(route('pessoas/pessoasShow', $pessoa->id), $pessoa->toArray())
        ->assertStatus(200)
        ->assertSee($pessoa->nome);
    }

    /**
     * Testa se, ao exibir uma lista de contatos, retorna o status HTTP correto e, deverá ser implementada uma forma de checar os dados na view.
     *
     * @return void
     */
    public function testSeListaPessoas()
    {
        $this->signIn();

        $pessoa = factory('App\Pessoa', 3)->create();

        $this->get(route('pessoas/pessoasList'), $pessoa->toArray())
        ->assertStatus(200);
    }

    public function testPessoaComMultiplasTarefas()
    {
        $this->signIn();
        // $pessoas = factory('App\Pessoa', 3)->create()->each(function ($pessoa) {
        //     $pessoa->tarefas()->saveMany(factory('App\Tarefa', 5)->create());
        // });
        $pessoas = factory('App\Pessoa')->create();
        $tarefas = factory('App\Tarefa', 5)->create();

        $pessoas->tarefas()->setRelation('tarefas', $tarefas);

        $this->assertEquals($pessoas->id, $tarefas->id);
    }
}
