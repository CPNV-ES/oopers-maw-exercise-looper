<?php

namespace App\Entity;

use ORM as ORM;

#[ORM\Table('fillings')]
class Filling
{

    #[ORM\Column('id')]
    private int $id;

    #[ORM\Column('questionnaires_id')]
    private int|Exercise $exercise;

    #[ORM\Column('submission_date')]
    private \DateTimeImmutable $submission_date;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Filling
    {
        $this->id = $id;
        return $this;
    }

    public function getExercise(): Exercise|int
    {
        return $this->exercise;
    }

    public function setExercise(Exercise|int $exercise): Filling
    {
        $this->exercise = $exercise;
        return $this;
    }

    public function getSubmissionDate(): \DateTimeImmutable
    {
        return $this->submission_date;
    }

    public function setSubmissionDate(\DateTimeImmutable $submission_date): Filling
    {
        $this->submission_date = $submission_date;
        return $this;
    }


}