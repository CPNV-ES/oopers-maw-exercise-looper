<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;

#[Route("/exercises")]
class ExercisesCreation extends Controller
{
    #[Route("/new", name: 'exercise.new')]
    public function showExerciseCreation(): Response
    {
        return $this->render('exercises/creation/new-exercice');
    }

    #[Route("", name: 'exercise.new', methods: [HTTPMethod::POST])]
    public function createExercise(): Response
    {
        $response = new Response();
        $response->headers->set('Location', "exercises/99/fields");
        return $response;
    }

    #[Route("/[:exerciceid]/fields", name: 'exercise.fields')]
    public function showExerciseFields($exerciceid): Response
    {
        return $this->render('exercises/creation/fields');
    }

    #[Route("/[:exerciceid]/fields", name: 'exercise.fields', methods: [HTTPMethod::POST])]
    public function createExerciseField($exerciceid): Response
    {
        return $this->render('exercises/creation/fields');
    }

    #[Route("/[:exerciceid]/fields/[:fieldid]/edit", name: 'exercise.field.edit')]
    public function showFieldEdition($exerciceid, $fieldid): Response
    {
        return $this->render('exercises/creation/field-edit');
    }

    #[Route("/[:exerciceid]/fields/[:fieldid]", name: 'exercise.field', methods: [HTTPMethod::POST])]
    public function editField($exerciceid, $fieldid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../fields");
        return $response;
    }

    #[Route("/[:exerciceid]/fields/[:fieldid]", name: 'exercise.field', methods: [HTTPMethod::DELETE])]
    public function deleteField($exerciceid, $fieldid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../fields");
        return $response;
    }
}