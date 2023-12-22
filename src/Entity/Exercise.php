<?php

namespace App\Entity;

use ORM\Column;
use ORM\DatabaseOperations;
use ORM\EntitiesTraits\Create;
use ORM\EntitiesTraits\Delete;
use ORM\EntitiesTraits\GetAll;
use ORM\EntitiesTraits\GetOne;
use ORM\EntitiesTraits\Update;
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

    private array $questions = [];

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
    public static function getAllArrangedByStateWithQuestions(DatabaseOperations $operations) : array
    {
        $stateExercisesMap = [];
        foreach (self::getAllWithFilledQuestions($operations) as $exercise){
            $stateExercisesMap[$exercise->getState()->value][] = $exercise;
        }
        return $stateExercisesMap;
    }

    /**
     * Get all the exercises with filled question (this will be automatic in the future)
     * @param DatabaseOperations $operations
     * @return array
     */
    public static function getAllWithFilledQuestions(DatabaseOperations $operations): array
    {
        //TODO : Fix this when newer version of ORM is merged (it will be automatically assigned)
        $questions = Question::getAll($operations);
        $exercisesMap = self::getAllInMap($operations);
        foreach ($questions as $question){
            $id = $question->getExercise()->getId();
            $exercisesMap[$id]->questions[] = $question;
        }
        return $exercisesMap;
    }

    public function canBeReadyForAnswers() : bool
    {
        return count($this->questions) > 0 && $this->state == ExerciseState::BUILDING;
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

    public function getQuestions(): array
    {
        return $this->questions;
    }
}