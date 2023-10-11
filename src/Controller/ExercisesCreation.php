<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Routing\Annotation\Route;
use MVC\Http\Response\Response;

#[Route("/exercises")]
class ExercisesCreation extends Controller
{
    #[Route("/new")]
    public function showExerciseCreation(): Response
    {
        return $this->render('exercises/creation/new-exercice');
    }

    #[Route("", methods: [HTTPMethod::POST])]
    public function createExercise(): Response
    {
        $response = new Response();
        $response->headers->set('Location', "exercises/99/fields");
        return $response;
    }

    #[Route("/[:exerciceid]/fields")]
    public function showExerciseFields($exerciceid): Response
    {
        return $this->render('exercises/creation/fields');
    }

    #[Route("/[:exerciceid]/fields", methods: [HTTPMethod::POST])]
    public function createExerciseField($exerciceid): Response
    {
        return $this->render('exercises/creation/fields');
    }

    #[Route("/[:exerciceid]/fields/[:fieldid]/edit")]
    public function showFieldEdition($exerciceid, $fieldid): Response
    {
        return $this->render('exercises/creation/field-edit');
    }

    #[Route("/[:exerciceid]/fields/[:fieldid]", methods: [HTTPMethod::POST])]
    public function editField($exerciceid, $fieldid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../fields");
        return $response;
    }

    #[Route("/[:exerciceid]/fields/[:fieldid]", methods: [HTTPMethod::DELETE])]
    public function deleteField($exerciceid, $fieldid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../fields");
        return $response;
    }
}