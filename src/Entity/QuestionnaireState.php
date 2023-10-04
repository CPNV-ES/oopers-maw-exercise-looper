<?php

namespace App\Entity;

class QuestionnaireState
{

	private int $id;

	private string $displayed_name;

	private string $slug;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): QuestionnaireState
	{
		$this->id = $id;
		return $this;
	}

	public function getDisplayedName(): string
	{
		return $this->displayed_name;
	}

	public function setDisplayedName(string $displayed_name): QuestionnaireState
	{
		$this->displayed_name = $displayed_name;
		return $this;
	}

	public function getSlug(): string
	{
		return $this->slug;
	}

	public function setSlug(string $slug): QuestionnaireState
	{
		$this->slug = $slug;
		return $this;
	}





}