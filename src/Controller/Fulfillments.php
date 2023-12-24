<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Exercise;
use App\Entity\Filling;
use App\Entity\Question;
use App\Form\FillingForm;
use DateTime;
use MVC\Http\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\Driver\MySQL\SQLOperations;

#[Route("/exercises/[:exercise_id]/fulfillments", name: "exercises.fulfillments.")]
class Fulfillments extends Controller
{

    #[Route("/new", name: 'new', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function new(Exercise $exercise, SQLOperations $operations): Response
    {
        $questions = Question::getAllFromExercise($operations, $exercise->getId());
        $filling = (new Filling())
            ->setExercise($exercise)
            ->setAnswers(
                array_map(function ($question) {
                    return (new Answer())->setQuestion($question);
                }, $questions)
            )
            ->setSubmissionDate(new DateTime());

        $form = new FillingForm($filling);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filling->create($operations);
            foreach ($filling->getAnswers() as $answer) {
                $answer->setFilling($filling);
                $answer->create($operations);
            }
            return $this->redirectToRoute(
                'exercises.fulfillments.edit',
                ['exercise_id' => $exercise->getId(), 'filling_id' => $filling->getId()],
                HTTPStatus::HTTP_SEE_OTHER
            );
        }

        return $this->render('exercises.filling.new', [
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:filling_id]/edit", name: 'edit', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function edit(Exercise $exercise, Filling $filling, SQLOperations $operations): Response
    {
        $filling->setAnswers(Answer::getAllFromFilling($operations, $filling->getId()));

        $form = new FillingForm($filling);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filling->update($operations);
            foreach ($filling->getAnswers() as $answer) {
                $answer->setFilling($filling);
                $answer->update($operations);
            }
            return $this->redirectToRoute(
                'exercises.fulfillments.edit',
                ['exercise_id' => $exercise->getId(), 'filling_id' => $filling->getId()],
                HTTPStatus::HTTP_SEE_OTHER
            );
        }

        return $this->render('exercises.filling.edit', [
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:filling_id]", name: 'show')]
    public function showFulfillment(Exercise $exercise, Filling $filling, SQLOperations $operations): Response
    {
        $filling->setAnswers(Answer::getAllFromFilling($operations, $filling->getId()));
        return $this->render(
            'exercises.management.results-by-fulfillment',
            ['exercise' => $exercise, 'filling' => $filling]
        );
    }
}