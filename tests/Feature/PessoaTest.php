<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PessoaTest extends TestCase
{
    use DatabaseMigrations;

    public function testSeSalvaPessoa(){

        $this->signIn();

        $user = factory('App\Pessoa')->make();
        $this->post(route('pessoas/pessoasStore'), $user->toArray())
            ->assertStatus(200);
    }
}