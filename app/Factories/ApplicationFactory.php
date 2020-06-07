<?php

namespace App\Factories;

use App\Entities\ApplicationEntity;

class ApplicationFactory extends EntityFactory
{
    /**
     * @var string
     */
    protected static $entity = ApplicationEntity::class;

    /**
     * @param null $entity
     * @return ApplicationEntity
     */
    public static function bootEntity($entity = null) :ApplicationEntity
    {
        return parent::bootEntity($entity);
    }

    /**
     * @param array $data
     * @param null $userEntity
     * @return ApplicationEntity
     */
    public static function build($data = array(), $userEntity = null) :ApplicationEntity
    {
        $data = parent::build($data);
        $user = self::bootEntity($userEntity);

        if (isset($data['id'])) {
            $user->setId($data['id']);
        }

        if (isset($data['user_id'])) {
            $user->setUserId($data['user_id']);
        }

        if (isset($data['created_at'])) {
            $user->setCreatedAt($data['created_at']);
        }

        if (isset($data['start_date'])) {
            $user->setStartDate($data['start_date']);
        }

        if (isset($data['end_date'])) {
            $user->setEndDate($data['end_date']);
        }

        if (isset($data['total_days'])) {
            $user->setTotalDays($data['total_days']);
        }

        if (isset($data['status'])) {
            $user->setStatus($data['status']);
        }

        if (isset($data['reason'])) {
            $user->setReason($data['reason']);
        }

        return $user;
    }
}