<?php

namespace App\Mails;

use App\Entities\ApplicationEntity;

class ApplicationRequestMail extends Mail
{
    /**
     * ApplicationMail constructor.
     * @param ApplicationEntity $applicationEntity
     */
    public function __construct(ApplicationEntity $applicationEntity)
    {
        $this->setSubject('Application Request');
        $this->setMailData(['application' => $applicationEntity]);
        $this->setTemplate('mails.applications.request');
    }
}