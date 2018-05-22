<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use App\Listeners\NotificacaoUsuario;
use App\Events\NovaTarefaUsuario;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NovaTarefaUsuario::class' => [
            'App\Listeners\NotificacaoUsuario::class',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
