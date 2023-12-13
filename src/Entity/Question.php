<?php

namespace App\Entity;

use ORM\Mapping as ORM;

#[ORM\Table('questions')]
class Question
{

    #[ORM\Column('id')]
    private int $id;

    #[ORM\Column('statement')]
    private ?string $statement = null;

    #[ORM\Column('kind')]
    private QuestionKind $kind = QuestionKind::SINGLE_LINE_TEXT;

    #[ORM\Column('questionnaires_id')]
    private int|Exercise $exercise;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Question
    {
        $this->id = $id;
        return $this;
    }

    public function getStatement(): ?string
    {
        return $this->statement;
    }

    public function setStatement(string $statement): Question
    {
        $this->statement = $statement;
        return $this;
    }

    public function getKind(): QuestionKind
    {
        return $this->kind;
    }

    public function setKind(QuestionKind|string $kind): Question
    {
        if(is_string($kind))
            $this->kind = QuestionKind::from($kind);
        else
            $this->kind = $kind;
        return $this;
    }

    public function getExercise(): Exercise
    {
        return $this->exercise;
    }

    public function setExercise(Exercise $questionnaire): Question
    {
        $this->exercise = $questionnaire;
        return $this;
    }

    public function __toString(): string
    {
        return $this->getStatement() ?? "";
    }
}