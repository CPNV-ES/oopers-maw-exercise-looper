<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Form\ExerciseForm;
use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;


#[Route("/exercises", name:"exercises.")]
class Exercises extends Controller
{
    /*-- CREATION --*/
    #[Route("/new", name: 'new', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function new(SQLOperations $operations): Response
    {
        $exercise = new Exercise();
        $form = new ExerciseForm($exercise);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $id = $operations->create($exercise);
            return $this->redirectToRoute('exercises.fields.show', ['e_id' => $id], HTTPStatus::HTTP_SEE_OTHER);
        }

        return $this->render('exercises/new', ['form' => $form->renderView()]);
    }

    /*-- ANSWERING / FULFILLMENT --*/
    #[Route("/answering", name: 'answering')]
    public function answering(): Response
    {
        return $this->render('exercises.answering.list');
    }

    /*-- MANAGEMENT / RESULTS --*/
    #[Route("", name: 'index')]
    public function index(SQLOperations $operations): Response
    {
        return $this->render('exercises/index', [
            'building' => $operations->fetchAll(Exercise::class, ['state' => 'Building']),
            'answering' => $operations->fetchAll(Exercise::class, ['state' => 'Answering']),
            'closed' => $operations->fetchAll(Exercise::class, ['state' => 'Closed']),
        ]);
    }

    #[Route("/[:id]", name: 'update', methods: [HTTPMethod::PUT])]
    public function changExerciceInfo(int $exerciceId): Response
    {
        return $this->redirectToRoute("exercises.show");
    }

    #[Route("/[:id]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteExercise(int $exerciceId): Response
    {
        return $this->redirectToRoute("exercises.show");
    }
}