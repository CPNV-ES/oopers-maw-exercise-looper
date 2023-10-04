<?php

namespace App\Entity;

class Questionnaire
{

	private int $id;

	private string $title;

	private QuestionnaireState $state;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): Questionnaire
	{
		$this->id = $id;
		return $this;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $title): Questionnaire
	{
		$this->title = $title;
		return $this;
	}

	public function getState(): QuestionnaireState
	{
		return $this->state;
	}

	public function setState(QuestionnaireState $state): Questionnaire
	{
		$this->state = $state;
		return $this;
	}





}