<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Exercise;
use App\Entity\Filling;
use App\Entity\Question;
use App\Form\FillingForm;
use Cassandra\Date;
use DateTime;
use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;

#[Route("/exercises/[:e_id]/fulfillments", name:"exercises.fulfillments.")]
class Fulfillments extends Controller
{

    #[Route("/new", name: 'new', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function new(int $e_id, SQLOperations $operations): Response
    {
        $exercise = $operations->fetchOneOrThrow(Exercise::class, ['id' => $e_id]);
        $questions = $operations->fetchAll(Question::class, ['questionnaires_id' => $exercise->getId()]);
        $filling = (new Filling())
            ->setExercise($exercise)
            ->setAnswers(array_map(function ($question) {
                return (new Answer())->setQuestion($question);
            }, $questions))
            ->setSubmissionDate(new DateTime());

        $form = new FillingForm($filling);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $id = $operations->create($filling);
            $filling->setId($id);
            foreach ($filling->getAnswers() as $answer) {
                $answer->setFilling($filling);
                $operations->create($answer);
            }
            return $this->redirectToRoute('exercises.fulfillments.edit', ['e_id' => $exercise->getId(), 'fulfillmentId' => $filling->getId()], HTTPStatus::HTTP_SEE_OTHER);
        }

        return $this->render('exercises.filling.new', [
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/", name: 'create', methods: [HTTPMethod::POST])]
    public function addFulfillment(int $e_id): Response
    {
        $fulfillmentId = 0;
        return $this->redirectToRoute("exercises.fulfillments.edit",["e_id"=>$e_id,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]/edit", name: 'edit')]
    public function showEditFulfillment(int $e_id, int $fulfillmentId): Response
    {
        return $this->render('exercises.filling.edit',["exerciceId"=>$e_id,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]", name: 'update', methods: [HTTPMethod::PATCH])]
    public function editFulfillment(int $e_id, int $fulfillmentId): Response
    {
        return $this->redirectToRoute("exercises.fulfillments.edit",["e_id"=>1,"fulfillmentId"=>1]);
    }

    #[Route("/[:fulfillmentId]", name: 'show')]
    public function showFulfillment(int $e_id, int $fulfillmentId): Response
    {
        return $this->render('exercises.management.results-by-fulfillment');
    }
}