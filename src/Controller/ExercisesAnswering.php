<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;


#[Route("/exercises")]
class ExercisesAnswering extends Controller
{
    #[Route("/answering", name: 'answering')]
    public function index(): Response
    {
        return $this->render('exercises.answering.list');
    }

    #[Route("/[:id]/fulfillments/new", name: 'fulfillment.new')]
    public function showNewFulfillment(int $id): Response
    {
        return $this->render('exercises.answering.fulfillment');
    }

    #[Route("/[:id]/fulfillments", name: 'fulfillments', methods: [HTTPMethod::POST])]
    public function addFulfillment(int $id): Response
    {
        return $this->redirectToRoute("fulfillment.edit",["id"=>1,"fulfillmentId"=>1]);
    }

    #[Route("/[:id]/fulfillments/[:fulfillmentId]/edit", name: 'fulfillment.edit')]
    public function showEditFulfillment(int $id, int $fulfillmentId): Response
    {
        return $this->render('exercises.answering.fulfillmentEdit');
    }

    #[Route("/[:id]/fulfillments/[:fulfillmentId]", name: 'fulfillment', methods: [HTTPMethod::PATCH])]
    public function editFulfillment(int $id, int $fulfillmentId): Response
    {
        return $this->redirectToRoute("fulfillment.edit",["id"=>1,"fulfillmentId"=>1]);
    }
}