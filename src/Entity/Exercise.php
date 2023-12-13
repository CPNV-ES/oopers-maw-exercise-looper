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
     * Transform a given questionnaire list into a map of states with the list of questionnaires inside.
     * @param array $questionnaires - A given questionnaire list to arrange
     * @return array - The arranged map (key = one QuestionnaireState, value = list of questionnaires in this state)
     */
    public static function arrangeQuestionnairesByCategoryMap(array $questionnaires) : array
    {
        $categoryQuestionnairesMap = [];
        foreach ($questionnaires as $questionnaire){
            $categoryQuestionnairesMap[$questionnaire->getState()->value][] = $questionnaire;
        }
        return $categoryQuestionnairesMap;
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