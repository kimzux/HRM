<?php

namespace App\Notifications;

use App\Models\Disciplinary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DisciplinaryNotification extends Notification
{
    use Queueable;
    
    protected $disciplinary;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Disciplinary $disciplinary)
    {
        $this->disciplinary = $disciplinary;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line('You have new disciplinary records')
                    ->line($this->disciplinary->title)
                    ->action('Kindly Login To View', url('/'));
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
