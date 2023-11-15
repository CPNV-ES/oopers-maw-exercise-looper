<?php

namespace App\Models\Entities;

use ORM\Column;
use ORM\Table;

#[Table("questionnaire_state")]
class QuestionnaireState
{
    #[Column("id")]
    private int $id;
    #[Column("displayed_name")]
    private string $displayedName;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDisplayedName(): string
    {
        return $this->displayedName;
    }

    /**
     * @param mixed $displayedName
     */
    public function setDisplayedName(string $displayedName): void
    {
        $this->displayedName = $displayedName;
    }
}