<?php

namespace App\Entity;

use ORM\Column;
use ORM\Table;

#[Table("questionnaires")]
class Exercise
{
    #[Column("id")]
    private int $id;
    #[Column("title")]
    private string $title = "";
    #[Column("state")]
    private ExerciseState $state = ExerciseState::BUILDING;

    /**
     * Transform a given exercise list into a map of states with the list of exercises inside.
     * @param array $exercises - A given exercise list to arrange
     * @return array - The arranged map (key = one exercisestate, value = list of exercises in this state)
     */
    public static function arrangeExercisesByCategoryMap(array $exercises) : array
    {
        $categoryExercisesMap = [];
        foreach ($exercises as $exercise){
            $categoryExercisesMap[$exercise->getState()->value][] = $exercise;
        }
        return $categoryExercisesMap;
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