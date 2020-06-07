<?php

namespace App\Traits;

use App\Mails\Mail;
use App\Facades\Mail as MailFacade;

trait Notifiable
{
    /**
     * @param Mail $email
     */
    public function notify(Mail $email)
    {
        if ($this->email) {
            $email->setTo($this->email);
            MailFacade::send($email);
        }
    }
}