<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Exercise;
use App\Entity\Filling;
use App\Entity\Question;
use App\Form\FillingForm;
use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;

#[Route("/exercises/[:exerciseId]/fulfillments", name:"exercises.fulfillments.")]
class Fulfillments extends Controller
{

    #[Route("/new", name: 'new', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function new(int $exerciseId, SQLOperations $operations): Response
    {
        $exercise = $operations->fetchOneOrThrow(Exercise::class, ['id' => $exerciseId]);
        $questions = $operations->fetchAll(Question::class, ['questionnaires_id' => $exercise->getId()]);
        $filling = (new Filling())
            ->setExercise($exercise)
            ->setAnswers(array_map(function ($question) {
                return (new Answer())->setQuestion($question);
            }, $questions));

        $form = new FillingForm($filling);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $id = $operations->create($filling);
            $filling->setId($id);
            foreach ($filling->getAnswers() as $answer) {
                $answer->setFilling($filling);
                $operations->create($answer);
            }
            return $this->redirectToRoute('exercises.fulfillments.edit', ['exerciseId' => $exercise->getId(), 'fulfillmentId' => $filling->getId()], HTTPStatus::HTTP_SEE_OTHER);
        }

        return $this->render('exercises.filling.new', [
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/", name: 'create', methods: [HTTPMethod::POST])]
    public function addFulfillment(int $exerciseId): Response
    {
        $fulfillmentId = 0;
        return $this->redirectToRoute("exercises.fulfillments.edit",["exerciceId"=>$exerciseId,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]/edit", name: 'edit')]
    public function showEditFulfillment(int $exerciseId, int $fulfillmentId): Response
    {
        return $this->render('exercises.filling.edit',["exerciceId"=>$exerciseId,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]", name: 'update', methods: [HTTPMethod::PATCH])]
    public function editFulfillment(int $exerciceId, int $fulfillmentId): Response
    {
        return $this->redirectToRoute("exercises.fulfillments.edit",["exerciceId"=>1,"fulfillmentId"=>1]);
    }

    #[Route("/[:fulfillmentId]", name: 'show')]
    public function showFulfillment(int $exerciceId, int $fulfillmentId): Response
    {
        return $this->render('exercises.management.results-by-fulfillment');
    }
}