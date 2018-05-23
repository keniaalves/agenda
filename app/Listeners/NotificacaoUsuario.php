<?php

namespace App\Listeners;

use App\Events\NovaTarefaUsuario;

class NotificacaoUsuario
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaTarefaUsuario  $event
     * @return void
     */
    public function handle(NovaTarefaUsuario $event)
    {
        $tarefa             = $event->tarefa;
        $tarefa->comentario = 'testando evento';
        $tarefa->save();
    }
}
