<?php

namespace App\Models\Entities;

use ORM\Column;
use ORM\Table;

#[Table("questions")]
class Question
{
    #[Column("id")]
    private int $id;
    #[Column("statement")]
    private string $statement;
    #[Column("question_kind_id")]
    private QuestionKind $kind;
    #[Column("questionnaires_id")]
    private Questionnaire $questionnaire;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStatement(): string
    {
        return $this->statement;
    }

    public function setStatement(string $statement): void
    {
        $this->statement = $statement;
    }

    public function getKind(): QuestionKind
    {
        return $this->kind;
    }

    public function setKind(QuestionKind $kind): void
    {
        $this->kind = $kind;
    }

    public function getQuestionnaire(): Questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(Questionnaire $questionnaire): void
    {
        $this->questionnaire = $questionnaire;
    }
}