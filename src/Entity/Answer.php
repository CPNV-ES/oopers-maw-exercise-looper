<?php

namespace App\Entity;

use ORM as ORM;

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
        return in_array($this->question->getKind(), [Question::MULTI_SINGLE_LINE_TYPE, Question::MULTILINE_TYPE]);
    }

}