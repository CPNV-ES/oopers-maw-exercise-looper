<?php

namespace App\Service;

use App\Entity\Questionnaire;
use App\Repository\QuestionnaireStateRepository;

class QuestionnaireService
{

	public function __construct(
		private QuestionnaireStateRepository $stateRepository,
		private EntityManager $manager,
	)
	{
	}

	public function create(Questionnaire $questionnaire, string $defaultState = 'BUILDING')
	{
		$state = $this->stateRepository->findOneBy(['slug' => 'BUILDING']);
		$questionnaire->setState($state);
		$this->manager->save($questionnaire);

	}
}