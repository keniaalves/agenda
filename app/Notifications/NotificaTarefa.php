<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificaTarefa extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from('agenda@agenda.com')
                    ->subject('Você tem uma tarefa para hoje')
                    ->line('Para mais detalhes...')
                    ->action('Vai!', url('#'))
                    ->greeting('Olá e tchau!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
