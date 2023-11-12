<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;


#[Route("/exercises/[:exerciceId]/fields", name:"exercises.fields.")]
class Fields extends Controller
{
    #[Route("/", name: "show")]
    public function showExerciseFields(int $exerciceId): Response
    {
        return $this->render('exercises.creation.fields',["exerciceId"=>$exerciceId]);
    }

    #[Route("/", name: "create", methods: [HTTPMethod::POST])]
    public function createExerciseField(int $exerciceId): Response
    {
        return $this->render('exercises.creation.fields',["exerciceId"=>$exerciceId]);
    }

    #[Route("/[:fieldId]/edit", name: 'edit')]
    public function showFieldEdition(int $exerciceId, int $fieldId): Response
    {
        return $this->render('exercises.creation.field-edit',["exerciceId"=>$exerciceId,"fieldId"=>$fieldId]);
    }

    #[Route("[:fieldId]", name: 'update', methods: [HTTPMethod::POST])]
    public function editField(int $exerciceId, int $fieldId): Response
    {
        return $this->redirectToRoute("exercises.fields.list",["exerciceId"=>$exerciceId]);
    }

    #[Route("[:fieldId]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteField(int $exerciceId, int $fieldId): Response
    {
        return $this->redirectToRoute("exercises.fields.list",["exerciceId"=>$exerciceId,"fieldId"=>$fieldId]);
    }
}