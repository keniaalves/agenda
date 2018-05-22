<?php

namespace App\Jobs;

use App\Tarefa;
use Illuminate\Notifications\Notification;
use App\Notifications\NotificaTarefa; 
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotificacaoTarefaEmail implements ShouldQueue 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tarefa;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pessoas = $this->tarefa->pessoas;
        foreach($pessoas as $pessoa){
            \Notification::route('mail', $pessoa->email)
                ->notify( new NotificaTarefa()); 
        }
    }
}
