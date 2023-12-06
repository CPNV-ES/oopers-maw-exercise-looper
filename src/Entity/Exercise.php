<?php

namespace App\Entity;

use ORM as ORM;

#[ORM\Table('questionnaires')]
class Exercise
{

    #[ORM\Column('id')]
    private int $id;

    #[ORM\Column('state')]
    private string $state = "Building";

    #[ORM\Column('title')]
    private ?string $title = null;

    /**
     * @var Question[]
     */
    #[ORM\HasMany(entity: Question::class, targetProperty: 'questionnaire')]
    private array $questions = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Exercise
    {
        $this->id = $id;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): Exercise
    {
        $this->state = $state;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): Exercise
    {
        $this->title = $title;
        return $this;
    }

}