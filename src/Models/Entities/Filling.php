<?php

namespace App\Models\Entities;
use DateTime;
use ORM\Column;
use ORM\Table;

#[Table("fillings")]
class Filling
{
    #[Column("id")]
    private int $id;
    #[Column("questionnaires_id")]
    private Questionnaire $questionnaire;
    #[Column("submission_date")]
    private string $submissionDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getQuestionnaire(): Questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(Questionnaire $questionnaire): void
    {
        $this->questionnaire = $questionnaire;
    }

    public function getSubmissionDate(): string
    {
        return $this->submissionDate;
    }

    public function setSubmissionDate(string $submissionDate): void
    {
        $this->submissionDate = $submissionDate;
    }
}