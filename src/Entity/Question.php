<?php

namespace App\Entity;

use ORM as ORM;

#[ORM\Table('questions')]
class Question
{

    #[ORM\Column('id')]
    private int $id;

    #[ORM\Column('statement')]
    private string $statement;

    #[ORM\Column('kind')]
    private string $kind;

    #[ORM\Column('questionnaires_id')]
    private int|Exercise $questionnaire;

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

    public function getKind(): string
    {
        return $this->kind;
    }

    public function setKind(string $kind): Question
    {
        $this->kind = $kind;
        return $this;
    }

    public function getQuestionnaire(): Exercise|int
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(Exercise|int $questionnaire): Question
    {
        $this->questionnaire = $questionnaire;
        return $this;
    }


}