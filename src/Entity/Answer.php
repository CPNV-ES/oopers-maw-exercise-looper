<?php

namespace App\Entity;

use App\EntitiesTraits\Create;
use App\EntitiesTraits\GetAll;
use App\EntitiesTraits\Update;
use ORM\Column;
use ORM\Table;

#[Table('answers')]
class Answer
{
    use GetAll;
    use Create;
    use Update;

    #[Column("id")]
    private int $id;
    #[Column("content")]
    private string $content = "";
    #[Column("fillings_id")]
    private Filling $filling;
    #[Column("questions_id")]
    private Question $question;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Answer
    {
        $this->id = $id;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Answer
    {
        $this->content = $content;
        return $this;
    }

    public function getFilling(): Filling
    {
        return $this->filling;
    }

    public function setFilling(Filling $filling): Answer
    {
        $this->filling = $filling;
        return $this;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): Answer
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