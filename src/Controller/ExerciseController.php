<?php

namespace App\Controller;

use App\Entity\Questionnaire;
use App\Form\QuestionnaireForm;
use App\Service\QuestionnaireService;
use MVC\Http\HTTPStatus;
use MVC\Http\Response\Response;

/**
 * @method Response redirectToRoute(string $route, string[] $params, HTTPStatus $status)
 * @method Response render(string $template, mixed[] $context)
 * @method \string renderView(string $template, mixed[] $context)
 */
#[Route("/exercises", name: "exercise.")]
class ExerciseController extends AppController
{

	public function __construct(
		private QuestionnaireService $questionnaireService
	)
	{
	}

	#[Route("/[id]/fields", name: "edit.fields")]
	public function editFields(): Response
	{}

	#[Route("/new", name: "new")]
	public function new(): Response
	{
		$questionnaire = new Questionnaire();
		$form = new QuestionnaireForm($questionnaire, $this->request);

		if($form->isSubmitted()) {
			$this->questionnaireService->create($questionnaire);

			return $this->redirectToRoute('exercice.edit.fields', ['id' => $questionnaire->getId()], HTTPStatus::SEE_OTHER);
		}

		return $this->render('questionnaires.new', [
			'form' => $form->renderView()
		]);
	}


}