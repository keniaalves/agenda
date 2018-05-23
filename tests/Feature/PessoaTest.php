<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PessoaTest extends TestCase
{
    use DatabaseMigrations;

    public function testSeSalvaPessoa()
    {
        $this->signIn();

        $pessoa              = factory('App\Pessoa')->make();

        $this->post(route('pessoas/pessoasStore'), $pessoa->toArray())
            ->assertStatus(200)
            ->assertSee('Você conseguiu gravar um Contato!');

        $this->assertDatabaseHas('pessoas', ['email'=> $pessoa->email]);
    }

    public function testSeAtualizaPessoa()
    {
        $this->signIn();

        $pessoa = factory('App\Pessoa')->create();
        $this->put(route('pessoas/pessoasUpdate', $pessoa->id), $pessoa->toArray())
            ->assertStatus(200);
    }

    public function seDeletaPessoa()
    {
        $this->signIn();

        $user = factory('App\Pessoa')->create();
        $this->delete(route('pessoas/pessoasDelete'), $user->toArray())
            ->assertStatus(200);
    }
}
