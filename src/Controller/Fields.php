<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;


#[Route("/exercises/[:e_id]/fields", name:"exercises.fields.")]
class Fields extends Controller
{
    #[Route("", name: "show")]
    public function show(int $e_id): Response
    {
        return $this->render('exercises.creation.fields',["exerciceId"=>$e_id]);
    }

    #[Route("/", name: "create", methods: [HTTPMethod::POST])]
    public function createExerciseField(int $e_id): Response
    {
        return $this->render('exercises.creation.fields',["exerciceId"=>$e_id]);
    }

    #[Route("/[:fieldId]/edit", name: 'edit')]
    public function showFieldEdition(int $e_id, int $fieldId): Response
    {
        return $this->render('exercises.creation.field-edit',["exerciceId"=>$e_id,"fieldId"=>$fieldId]);
    }

    #[Route("[:fieldId]", name: 'update', methods: [HTTPMethod::POST])]
    public function editField(int $e_id, int $fieldId): Response
    {
        return $this->redirectToRoute("exercises.fields.list",["exerciceId"=>$e_id]);
    }

    #[Route("[:fieldId]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteField(int $e_id, int $fieldId): Response
    {
        return $this->redirectToRoute("exercises.fields.list",["exerciceId"=>$e_id,"fieldId"=>$fieldId]);
    }
}