<?php

namespace App\Entities;

use App\Helpers\App;
use App\Models\User;
use App\Models\Application;
use App\Events\ApplicationEvents;

class ApplicationEntity extends Entity
{
    /**
     * @var string
     */
    protected $model = Application::class;

    /**
     * @var string
     */
    protected $entity_events = ApplicationEvents::class;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $start_date;

    /**
     * @var string
     */
    protected $end_date;

    /**
     * @var int
     */
    protected $total_days;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $reason;

    /*
     * @return UserEntity
     */
    public function user() :UserEntity
    {
        return User::findOrFail($this->user_id());
    }

    /*
     * @return bool
     */
    public function approve() :bool
    {
        $this->setStatus(App::applicationStatus()[1]);

        return $this->update();
    }

    /*
     * @return bool
     */
    public function reject() :bool
    {
        $this->setStatus(App::applicationStatus()[2]);

        return $this->update();
    }

    /* GETTERS */

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function user_id()
    {
        return $this->user_id;
    }

    /**
     * @param bool $format
     * @return string
     */
    public function created_at($format = false)
    {
        if ($format) {
            return App::formatDate($this->created_at, 'Y-m-d H:i:s', 'd M Y H:i:s');
        }

        return $this->created_at;
    }

    /**
     * @param bool $format
     * @return string
     */
    public function start_date($format = false)
    {
        if ($format) {
            return App::formatDate($this->start_date);
        }

        return $this->start_date;
    }

    /**
     * @param bool $format
     * @return string
     */
    public function end_date($format = false)
    {
        if ($format) {
            return App::formatDate($this->end_date);
        }

        return $this->end_date;
    }

    /**
     * @return int
     */
    public function total_days()
    {
        return $this->total_days;
    }

    /**
     * @return string
     */
    public function reason()
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /* SETTERS */

    /**
     * @param $value
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * @param $value
     */
    public function setUserId($value)
    {
        $this->user_id = $value;
    }

    /**
     * @param $value
     */
    public function setCreatedAt($value)
    {
        $this->created_at = $value;
    }

    /**
     * @param $value
     */
    public function setStartDate($value)
    {
        $this->start_date = $value;
    }

    /**
     * @param $value
     */
    public function setEndDate($value)
    {
        $this->end_date = $value;
    }

    /**
     * @param $value
     */
    public function setTotalDays($value)
    {
        $this->total_days = $value;
    }

    /**
     * @param $value
     */
    public function setStatus($value)
    {
        $this->status = $value;
    }

    /**
     * @param $value
     */
    public function setReason($value)
    {
        $this->reason = $value;
    }
}