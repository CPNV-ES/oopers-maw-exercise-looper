<?php

namespace App\Entity;

use ORM\Mapping as ORM;

#[ORM\Table('answers')]
class Answer
{

    #[ORM\Column('id')]
    private int $id;

    #[ORM\Column('content')]
    private ?string $content = null;

    #[ORM\Column('fillings_id')]
    #[ORM\BelongsTo(inversedBy: 'answers')]
    private int|Filling $filling;

    #[ORM\Column('questions_id')]
    #[ORM\BelongsTo(inversedBy: 'answers')]
    private int|Question $question;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Answer
    {
        $this->id = $id;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): Answer
    {
        $this->content = $content;
        return $this;
    }

    public function getFilling(): int|Filling
    {
        return $this->filling;
    }

    public function setFilling(int|Filling $filling): Answer
    {
        $this->filling = $filling;
        return $this;
    }

    public function getQuestion(): Question|int
    {
        return $this->question;
    }

    public function setQuestion(Question|int $question): Answer
    {
        $this->question = $question;
        return $this;
    }

    public function isMultiline(): bool
    {
        return in_array($this->question->getKind(), [QuestionKind::MULTILINE_TEXT,QuestionKind::LIST_OF_SINGLE_LINES]);
    }

    public function getExercise(){
        return $this->filling->getExercise();
    }

    public function getContentLenghtValidation(): ContentLengthValidation
    {
        if (mb_strlen($this->content) >= 10) {
            return ContentLengthValidation::VERY_GOOD;
        }
        if (mb_strlen($this->content) > 0) {
            return ContentLengthValidation::SUFFICIENT;
        }
        return ContentLengthValidation::NOT_GOOD_ENOUGH;
    }
}