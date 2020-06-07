<?php

namespace App\Models;

use Illuminate\Support\Arr;
use App\Entities\ApplicationEntity;
use App\Factories\ApplicationFactory;

class Application extends Model
{
    /**
     * @var string
     */
    protected $factory = ApplicationFactory::class;

    /**
     * @param array $filters
     * @return ApplicationEntity
     */
    public static function find(array $filters) :ApplicationEntity
    {
        return parent::find($filters);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id) :ApplicationEntity
    {
        return parent::findById($id);
    }

    /**
     * @param $filters
     * @return ApplicationEntity
     */
    public static function findOrFail($filters) :ApplicationEntity
    {
        return parent::findOrFail($filters);
    }

    /**
     * @param ApplicationEntity $application
     * @return bool
     */
    public function insert(ApplicationEntity $application) :bool
    {
        $sql = 'INSERT INTO applications (
                    user_id,
                    created_at,
                    start_date,
                    end_date,
                    total_days,
                    status
                )
                VALUES(
                    :user_id,
                    :created_at,
                    :start_date,
                    :end_date,
                    :total_days,
                    :status
                )
        ';

        $stmt = db()->prepare($sql);
        $stmt->bindValue(':user_id', $application->user_id(),\PDO::PARAM_INT);
        $stmt->bindValue(':created_at', $application->created_at(),\PDO::PARAM_STR);
        $stmt->bindValue(':start_date', $application->start_date(),\PDO::PARAM_STR);
        $stmt->bindValue(':end_date', $application->end_date(),\PDO::PARAM_STR);
        $stmt->bindValue(':total_days', $application->total_days(),\PDO::PARAM_STR);
        $stmt->bindValue(':status', $application->status(),\PDO::PARAM_STR);

        $stmt->execute();

        $application->setId(db()->lastInsertId());

        return true;
    }

    /**
     * @param ApplicationEntity $application
     * @return bool
     */
    public function update(ApplicationEntity $application) :bool
    {
        $sql = 'UPDATE applications SET
            user_id =:user_id,
            created_at =:created_at,
            start_date =:start_date,
            end_date =:end_date,
            total_days =:total_days,
            status =:status
            WHERE id =:id
        ';

        $stmt = db()->prepare($sql);
        $stmt->bindValue(':id', $application->id(),\PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $application->user_id(),\PDO::PARAM_INT);
        $stmt->bindValue(':created_at', $application->created_at(),\PDO::PARAM_STR);
        $stmt->bindValue(':start_date', $application->start_date(),\PDO::PARAM_STR);
        $stmt->bindValue(':end_date', $application->end_date(),\PDO::PARAM_STR);
        $stmt->bindValue(':total_days', $application->total_days(),\PDO::PARAM_STR);
        $stmt->bindValue(':status', $application->status(),\PDO::PARAM_STR);

        $stmt->execute();

        return true;
    }

    /**
     * @param array $filters
     * @return ApplicationEntity
     */
    public function getEntity(array $filters) :ApplicationEntity
    {
        $sql = "SELECT * FROM applications WHERE";
        $stmt = $this->applyFilters($sql, $filters);
        $stmt->execute();
        $row = $stmt->fetch();

        return new ApplicationEntity(Arr::wrap($row));
    }

    /**
     * @param array $filters
     * @return array
     */
    public function allRecords(array $filters = []) :array
    {
        $records = [];
        $sql = "SELECT * FROM applications";

        if (count($filters) > 0) {
            $sql .= ' WHERE';
            $stmt = $this->applyFilters($sql, $filters, $orderBy = ['created_at DESC']);
            $stmt->execute();
        }
        else {
            $stmt  = db()->prepare($sql);
            $stmt->execute();
        }

        while ($row = $stmt->fetch()) {
            $records[] = new ApplicationEntity($row);
        }

        return $records;
    }
}
