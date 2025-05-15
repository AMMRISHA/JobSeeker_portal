<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationRejectedNotification extends Notification
{
    use Queueable;

    protected $jobTitle;

    public function __construct($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Application Rejected')
            ->greeting('Hello ' . $notifiable->name)
            ->line('We appreciate your interest in the position of ' . $this->jobTitle . '.')
            ->line('After careful consideration, we regret to inform you that your application has not been selected for further steps.')
            ->line('Thank you for taking the time to apply.')
            ->salutation('Regards, HR Team');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
