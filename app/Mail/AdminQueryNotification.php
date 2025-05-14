<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminQueryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $query;

    public function __construct($user, $query)
    {
        $this->user = $user;
        $this->query = $query;
    }

    public function build()
    {
        return $this->subject('New Applicant Query')
                    ->view('emails.admin_query_notification');
    }
}
