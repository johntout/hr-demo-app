<?php

namespace App\Mails;

use App\Entities\ApplicationEntity;

class ApplicationOutcomeMail extends Mail
{
    /**
     * ApplicationMail constructor.
     * @param ApplicationEntity $applicationEntity
     */
    public function __construct(ApplicationEntity $applicationEntity)
    {
        $this->setTo($applicationEntity->user()->email());
        $this->setSubject('Application Request - '. $applicationEntity->status());
        $this->setMailData(['application' => $applicationEntity]);
        $this->setTemplate('mails.applications.outcome');
    }
}