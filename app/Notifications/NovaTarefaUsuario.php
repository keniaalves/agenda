<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NovaTarefaUsuario extends Notification
{
    use Queueable;

    public $dados;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Oiê!')
                    ->line('Novas tarefas te esperam na sua Agenda')
                    ->action('Para mais detalhes, acesse', url('http://agenda.test/'))
                    ->line('Tenha um ótimo dia! :)');
    }

    public function toDatabase($notifiable)
    {
        return [
            'repliedTime'=>Carbon::now(),
            'tarefa'=>Tarefa::class,
            'pessoa'=>Pessoa::class,
            'user'=>auth()->user(),
            'dados'=>$this->dados
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([
            'repliedTime'=>Carbon::now(),
            'tarefa'=>Tarefa::class,
            'pessoa'=>Pessoa::class,
            'user'=>auth()->user(),
            'dados'=>$this->dados
        ]);
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
