<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testViewPessoa(){
        $this->get('pessoasList')->assertStatus(302);
        $this->get('pessoasCreate')->assertStatus(302);
        $this->get('pessoasShow/{id}')->assertStatus(302);
        $this->get('pessoasEdit/{id}')->assertStatus(302);
        $this->post('pessoasStore')->assertStatus(302);
        $this->put('pessoasUpdate/{id}')->assertStatus(302);
        $this->delete('pessoasDelete/{id}')->assertStatus(302);

        //$this->get('pessoasList')->assertSuccessful(); 
    }

    public function testViewTarefa(){
        $this->get('tarefasList')->assertStatus(302);
        $this->get('tarefasCreate')->assertStatus(302);
        $this->get('tarefasShow/{id}')->assertStatus(302);
        $this->get('tarefasEdit/{id}')->assertStatus(302);
        $this->post('tarefasStore')->assertStatus(302);
        $this->put('tarefasUpdate/{id}')->assertStatus(302);
        $this->delete('tarefasDelete/{id}')->assertStatus(302);
    }
}
