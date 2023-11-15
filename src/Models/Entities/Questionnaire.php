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