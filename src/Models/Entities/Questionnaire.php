<?php

namespace App\Models\Entities;

use ORM\Column;
use ORM\Table;

#[Table("questionnaires")]
class Questionnaire
{
    #[Column("id")]
    private int $id;
    #[Column("title")]
    private string $title;
    #[Column("state")]
    private QuestionnaireState $state = QuestionnaireState::Building;

    /**
     * Transform a given questionnaire list into a map of states with the list of questionnaires inside.
     * @param array $questionnaires - A given questinonaire list to arrange
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
        return $questionCount > 0 &&  $this->state == QuestionnaireState::Building;
    }

    public function canManageFields(){
        return $this->state == QuestionnaireState::Building;
    }

    public function canDeleteFields(){
        return $this->state != QuestionnaireState::Answering;
    }

    public function canClose(){
        return $this->state == QuestionnaireState::Answering;
    }

    public function canShowResults(){
        return $this->state != QuestionnaireState::Building;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getState(): QuestionnaireState
    {
        return $this->state;
    }

    public function setState(QuestionnaireState $state): void
    {
        $this->state = $state;
    }
}