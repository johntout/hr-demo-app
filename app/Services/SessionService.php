<?php

namespace App\Services;

use App\Facades\Container;
use Illuminate\Support\Arr;
use App\Interfaces\Services;

class SessionService implements Services
{
    /**
     * @var null|SessionService
     */
    private static $instance = NULL;

    /**
     * @var string
     */
    protected $sessionType;

    /**
     * @return \Slim\Flash\Messages
     */
    public function flash()
    {
        return Container::get('flash');
    }

    /**
     * @return mixed|void
     */
    public static function boot() :SessionService
    {
        if(self::$instance == NULL) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $key
     * @return mixed|string
     */
    public function get(string $key)
    {
        $value = Arr::get($_SESSION[$this->sessionType], $key);

        return $value;
    }

    /**
     * @param $key
     * @param $value
     * @return bool|void
     */
    public function set($key, $value)
    {
        if (empty($key)) {
            return false;
        }

        Arr::set($_SESSION[$this->sessionType], $key, $value);
    }

    /**
     * @param string $key
     */
    public function unset(string $key = '*')
    {
        if ($key == '*') {
            Arr::forget($_SESSION, $this->sessionType);
        }
        else {
            Arr::forget($_SESSION[$this->sessionType], $key);
        }
    }

    public function destroy()
    {
        session_destroy();
    }

    /**
     * @param string $type
     */
    public function setSessionType(string $type)
    {
        $this->sessionType = $type;
    }
}