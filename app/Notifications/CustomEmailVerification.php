<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class CustomEmailVerification extends VerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable); // this is the key part!

        return (new MailMessage)
            ->subject('Please verify your email address')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Please click the button below to verify your email address.')
            ->action('Verify Email', $verificationUrl)
            ->line('Thank you for using our application!');
    }
}
