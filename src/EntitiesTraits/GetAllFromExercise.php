<?php
namespace App\EntitiesTraits;

use ORM\DatabaseOperations;

/**
 * This trait add the possibility to get all entities from a given exercise id of the class using this trait in the database
 */
trait GetAllFromExercise
{
    use GetAll;

    /**
     * Get all entities instances in a given exercise
     * @param DatabaseOperations $operations - The db operations executor that will be used
     * @param int $exerciseId - The unique identifier of the exercise
     * @return array - All entities matching the whereCondition (everyone by default)
     */
    public static function getAllFromExercise(DatabaseOperations $operations, int $exerciseId) : array
    {
        return self::getAll($operations, ['questionnaires_id' => $exerciseId]);
    }
}