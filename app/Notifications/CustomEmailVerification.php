<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
class CustomEmailVerification extends Notification
{

    use Queueable;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
      
        return (new MailMessage)
            ->subject('Your Verification Code')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your verification code is:')
            ->line("**{$this->code}**")  // bold formatting
            ->line('Please enter this code to verify your email.')
            ->salutation('Regards, ' . config('app.name'));

    }
}
