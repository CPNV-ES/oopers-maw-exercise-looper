<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;


#[Route("/exercises", name:"exercises.")]
class Exercises extends Controller
{
    /*-- CREATION --*/
    #[Route("/new", name: 'new')]
    public function showExerciseCreation(): Response
    {
        return $this->render('exercises.creation.new-exercice');
    }

    #[Route("", name: 'create', methods: [HTTPMethod::POST])]
    public function createExercise(): Response
    {
        $id = 0;//TODO : The id of exercise created
        return $this->redirectToRoute("exercises.fields.show",["exerciceId"=>$id]);
    }

    /*-- ANSWERING / FULFILLMENT --*/
    #[Route("/answering", name: 'answering')]
    public function index(): Response
    {
        return $this->render('exercises.answering.list');
    }

    /*-- MANAGEMENT / RESULTS --*/
    #[Route("", name: 'show')]
    public function showExercisesList(): Response
    {
        return $this->render('exercises.management.list');
    }

    #[Route("/[:exerciceId]", name: 'update', methods: [HTTPMethod::PUT])]
    public function changExerciceInfo(int $exerciceId): Response
    {
        return $this->redirectToRoute("exercises.show");
    }

    #[Route("/[:exerciceId]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteExercise(int $exerciceId): Response
    {
        return $this->redirectToRoute("exercises.show");
    }
}