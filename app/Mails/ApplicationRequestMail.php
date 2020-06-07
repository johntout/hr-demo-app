<?php

namespace App\Mails;

use App\Entities\UserEntity;
use App\Entities\ApplicationEntity;

class ApplicationRequestMail extends Mail
{
    /**
     * ApplicationMail constructor.
     * @param UserEntity $recipient
     * @param ApplicationEntity $applicationEntity
     */
    public function __construct(ApplicationEntity $applicationEntity)
    {
        $this->setSubject('Application Request');
        $this->setMailData(['application' => $applicationEntity]);
        $this->setTemplate('mails.applications.request');
    }
}