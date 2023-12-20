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

#[Table('questions')]
class Question
{
    use Create;
    use GetAll;
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

    public static function getAllFromExercise(DatabaseOperations $operations, int $exerciseId) : array
    {
        return self::getAll($operations, ['questionnaires_id' => $exerciseId]);
    }

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