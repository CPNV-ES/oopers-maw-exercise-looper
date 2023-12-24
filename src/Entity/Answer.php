<?php

namespace App\Entity;

use ORM\Mapping\Column;
use ORM\DatabaseOperations;
use ORM\EntityTrait\Create;
use ORM\EntityTrait\GetAll;
use ORM\EntityTrait\Update;
use ORM\Mapping\Table;

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

    /**
     * Get all entities instances in a given filling
     * @param DatabaseOperations $operations - The db operations executor that will be used
     * @param int $fillingId - The unique identifier of the filling
     * @return array - All entities matching inside the filling
     */
    public static function getAllFromFilling(DatabaseOperations $operations, int $fillingId): array
    {
        return self::getAll($operations, ['fillings_id' => $fillingId]);
    }

    /**
     * Get all answers of a question
     * @param DatabaseOperations $operations - The db operations executor that will be used
     * @param int $questionId - The unique identifier of the question
     * @return array - All answers for a question
     */
    public static function getAllFromQuestion(DatabaseOperations $operations, int $questionId): array
    {
        return self::getAll($operations, ['questions_id' => $questionId]);
    }

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
        return in_array($this->question->getKind(), [QuestionKind::MULTILINE_TEXT, QuestionKind::LIST_OF_SINGLE_LINES]);
    }

    public function getExercise()
    {
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