<?php

namespace App\Jobs;

use App\Pessoa;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Notifications\NotificaConvidaPessoa; 
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ConvidaPessoa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $pessoa;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Notification::route('mail', $this->pessoa->email)
            ->notify( new NotificaConvidaPessoa()); 
    }
}
