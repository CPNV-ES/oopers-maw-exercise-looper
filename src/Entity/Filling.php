<?php

namespace App\Entity;

use DateTime;
use ORM\Mapping\Column;
use ORM\DatabaseOperations;
use ORM\EntityTrait\Create;
use ORM\EntityTrait\GetAll;
use ORM\EntityTrait\GetOne;
use ORM\EntityTrait\Update;
use App\EntityTrait\GetAllFromExercise;
use ORM\Mapping\Table;

#[Table('fillings')]
class Filling
{
    use Create;
    use GetOne;
    use GetAll;
    use GetAllFromExercise;
    use Update;

    #[Column('id')]
    private int $id;

    #[Column('questionnaires_id')]
    private Exercise $exercise;

    #[Column("submission_date")]
    private DateTime $submissionDate;

    private array $answers = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Filling
    {
        $this->id = $id;
        return $this;
    }

    public function getExercise(): Exercise
    {
        return $this->exercise;
    }

    public function setExercise(Exercise $exercise): Filling
    {
        $this->exercise = $exercise;
        return $this;
    }

    public function getSubmissionDate(): DateTime
    {
        return $this->submissionDate;
    }

    public function setSubmissionDate(DateTime $submissionDate): Filling
    {
        $this->submissionDate = $submissionDate;
        return $this;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): Filling
    {
        $this->answers = $answers;
        return $this;
    }

    public function addAnswer(Answer $answer): Filling
    {
        $this->answers[] = $answer;
        return $this;
    }
}