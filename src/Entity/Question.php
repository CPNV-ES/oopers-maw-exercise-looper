<?php

namespace App\Entity;

use App\EntityTrait\GetAllFromExercise;
use ORM\Mapping\Column;
use ORM\EntityTrait\Create;
use ORM\EntityTrait\Delete;
use ORM\EntityTrait\GetAll;
use ORM\EntityTrait\GetOne;
use ORM\EntityTrait\Update;
use ORM\Mapping\Table;

#[Table('questions')]
class Question
{
    use Create;
    use GetAll;
    use GetAllFromExercise;
    use GetOne;
    use Update;
    use Delete;

    #[Column("id")]
    private int $id;
    #[Column("statement")]
    private string $statement = "";
    #[Column("kind")]
    private QuestionKind $kind = QuestionKind::SINGLE_LINE_TEXT;
    #[Column("questionnaires_id")]
    private Exercise $exercise;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Question
    {
        $this->id = $id;
        return $this;
    }

    public function getStatement(): string
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

    public function setExercise(Exercise $exercise): Question
    {
        $this->exercise = $exercise;
        return $this;
    }

    public function __toString(): string
    {
        return $this->getStatement() ?? "";
    }
}