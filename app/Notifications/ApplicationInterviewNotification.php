<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationInterviewNotification extends Notification
{
    use Queueable;
     protected $jobTitle;
    /**
     * Create a new notification instance.
     */
    public function __construct( $jobTitle)
    {
        $this-> jobTitle =  $jobTitle ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Interview for the Application')
            ->greeting('Congratulations ' . $notifiable->name)
            ->line('Your application is selected for the role of ' . $this->jobTitle . '.')
            ->line('Your Interview date will be inform you before 2 days of your interview . ')
            ->line('Thanks.')
            ->salutation('Regards, HR Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
