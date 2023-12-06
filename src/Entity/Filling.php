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

    /**
     * @var Answer[]
     */
    #[ORM\HasMany(entity: Answer::class, targetProperty: 'filling')]
    private array $answers = [];

    #[ORM\Column('submission_date')]
    private string $submission_date;

    public function __construct()
    {
        $this->setSubmissionDate((new \DateTimeImmutable())->format('c'));
    }

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

    public function getSubmissionDate(): string
    {
        return $this->submission_date;
    }

    public function setSubmissionDate(string $submission_date): Filling
    {
        $this->submission_date = $submission_date;
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