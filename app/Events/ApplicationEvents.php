<?php

namespace App\Events;

use App\Mails\ApplicationRequestMail;
use App\Models\User;
use App\Entities\ApplicationEntity;
use App\Mails\ApplicationOutcomeMail;

class ApplicationEvents
{
    /**
     * @param ApplicationEntity $application
     */
    public function inserted(ApplicationEntity $application)
    {
        $admins = User::all(['role' => 'Admin']);

        foreach ($admins as $admin) {
            $admin->notify(new ApplicationRequestMail($application));
        }
    }

    /**
     * @param ApplicationEntity $application
     */
    public function updated(ApplicationEntity $application)
    {
        $application->user()->notify(new ApplicationOutcomeMail($application));
    }
}