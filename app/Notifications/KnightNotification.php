<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class KnightNotification extends Notification
{
    use Queueable;
    private $knightData;
    private $userData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($knightData, $userData)
    {
        $this->knightData = $knightData;
        $this->userData = $userData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('Knight letter to Princess')
                    ->line('Knight is create')
                    ->line('Knight name : '.$this->knightData->name);
    }
    public function toDatabase($notifiable)
    {
            return [
                'subject' => 'Knight letter to Princess',
                'sent_to' => $this->userData['email'],
                'sent_by' => 'sikander@admin.com',
                'notification_type' => 'letter',
                'data' => $this->knightData
            ];
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
            'knight_id' => $this->knightData->knight_id
        ];
    }
}
