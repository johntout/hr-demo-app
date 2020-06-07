<?php

namespace App\Facades;

/**
 * @method static void destroy()
 * @method static void set($key, $value)
 * @method static void unset($what = '')
 * @method static mixed get(string $what)
 * @method static \Slim\Flash\Messages flash()
 * @method static mixed getSessionType($what = '')
 * @method static void setSessionType(string $type)
 * @method static \App\Entities\NodeEntity getNode()
 * @method static \App\Services\SessionService self()
 * @method static void setNavigation($request,  \App\Entities\NodeEntity $node)
 */

class Session extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'session';
    }
}