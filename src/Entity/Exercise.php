<?php

namespace App\Entity;

use App\EntitiesTraits\Create;
use App\EntitiesTraits\Delete;
use App\EntitiesTraits\GetAll;
use App\EntitiesTraits\GetOne;
use App\EntitiesTraits\Update;
use ORM\Column;
use ORM\DatabaseOperations;
use ORM\Table;

#[Table("questionnaires")]
class Exercise
{
    use Create;
    use Delete;
    use GetAll;
    use GetOne;
    use Update;

    #[Column("id")]
    private int $id;
    #[Column("title")]
    private string $title = "";
    #[Column("state")]
    private ExerciseState $state = ExerciseState::BUILDING;

    /**
     * Get all exercises in the Database in the desired state
     * @param DatabaseOperations $operations - The db operations executor that will be used
     * @return array - All the exercises with the given state
     */
    public static function getAllWithDesiredState(DatabaseOperations $operations, ExerciseState $state) : array
    {
        return self::getAll($operations,["state"=>$state->value]);
    }

    /**
     * Get all exercises and put them into a map of states with the list of exercises inside.
     * @return array - The arranged map (key = one exercise state, value = list of exercises in this state)
     */
    public static function getAllArrangedByState(DatabaseOperations $operations) : array
    {
        $stateExercisesMap = [];
        foreach (self::getAll($operations) as $exercise){
            $stateExercisesMap[$exercise->getState()->value][] = $exercise;
        }
        return $stateExercisesMap;
    }

    public function canBeReadyForAnswers($questionCount) : bool
    {
        return $questionCount > 0 &&  $this->state == ExerciseState::BUILDING;
    }

    public function canManageFields(): bool
    {
        return $this->state == ExerciseState::BUILDING;
    }

    public function canDeleteFields(): bool
    {
        return $this->state != ExerciseState::ANSWERING;
    }

    public function canClose(): bool
    {
        return $this->state == ExerciseState::ANSWERING;
    }

    public function canShowResults(): bool
    {
        return $this->state != ExerciseState::BUILDING;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Exercise
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Exercise
    {
        $this->title = $title;
        return $this;
    }

    public function getState(): ExerciseState
    {
        return $this->state;
    }

    public function setState(ExerciseState $state): Exercise
    {
        $this->state = $state;
        return $this;
    }
}