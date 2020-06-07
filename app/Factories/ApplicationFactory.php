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
     * @param null $applicationEntity
     * @return ApplicationEntity
     */
    public static function build($data = array(), $applicationEntity = null) :ApplicationEntity
    {
        $data = parent::build($data);
        $application = self::bootEntity($applicationEntity);

        if (isset($data['id'])) {
            $application->setId($data['id']);
        }

        if (isset($data['user_id'])) {
            $application->setUserId($data['user_id']);
        }

        if (isset($data['created_at'])) {
            $application->setCreatedAt($data['created_at']);
        }

        if (isset($data['start_date'])) {
            $application->setStartDate($data['start_date']);
        }

        if (isset($data['end_date'])) {
            $application->setEndDate($data['end_date']);
        }

        if (isset($data['total_days'])) {
            $application->setTotalDays($data['total_days']);
        }

        if (isset($data['status'])) {
            $application->setStatus($data['status']);
        }

        if (isset($data['reason'])) {
            $application->setReason($data['reason']);
        }

        return $application;
    }
}