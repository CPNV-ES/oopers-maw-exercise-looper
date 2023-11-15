<?php

namespace App\Models\Entities;

use ORM\Column;
use ORM\Table;

#[Table("question_kind")]
class QuestionKind
{
    #[Column("id")]
    private int $id;
    //TODO : Fix the name in DB
    #[Column("displayed name")]
    private int $displayedName;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDisplayedName(): int
    {
        return $this->displayedName;
    }

    public function setDisplayedName(int $displayedName): void
    {
        $this->displayedName = $displayedName;
    }
}