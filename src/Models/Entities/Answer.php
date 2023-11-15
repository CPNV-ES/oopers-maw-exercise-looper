<?php

namespace App\Models\Entities;
use ORM\Column;
use ORM\Table;

#[Table("answers")]
class Answer
{
    #[Column("id")]
    private int $id;
    #[Column("content")]
    private string $content;
    #[Column("fillings_id")]
    private Filling $filling;
    #[Column("questions_id")]
    private Question $question;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getFilling(): Filling
    {
        return $this->filling;
    }

    public function setFilling(Filling $filling): void
    {
        $this->filling = $filling;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): void
    {
        $this->question = $question;
    }
}