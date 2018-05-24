<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PesquisaTest extends DuskTestCase
{
    /**
     * Testa a pesquisa de tarefas que filtra e mostra na página de listagem as tarefas de acordo com a quantidade de pessoas informada
     *
     * @return void
     */
    public function testPesquisaTarefasPelaQuantidadePessoas()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/tarefasList')
                    ->click('@quantidade-pessoas', 2)
                    ->assertSee('Tarefa com duas pessoas');
        });
    }
}
