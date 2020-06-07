<?php

namespace App\Providers;

use Pimple\Container;
use App\Services\MailService;

class MailServiceProvider extends ServiceProvider
{
    /**
     * @param Container $container
     * @return mixed|void
     */
    public function register(Container $container)
    {
        $container['mail'] = function () {
           return MailService::boot();
        };
    }
}