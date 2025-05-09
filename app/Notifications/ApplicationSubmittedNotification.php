<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationSubmittedNotification extends Notification
{
    use Queueable;
    protected $jobId;

    /**
     * Create a new notification instance.
     */
    public function __construct($jobId , $title)
    {
          $this->jobId = $jobId;
          $this->title = $title ;
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
            ->subject('Application Submitted Successfully')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your application for the position of .' . $this->title .' (Job ID: ' . $this->jobId . ' )has been submitted.')
            ->line('Thank you for applying!')
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
