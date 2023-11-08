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
        return $this->render('exercises/answering/list');
    }

    #[Route("/[:id]/fulfillments/new", name: 'fulfillment.new')]
    public function showNewFulfillment(int $id): Response
    {
        return $this->render('exercises/answering/fulfillment');
    }

    #[Route("/[:id]/fulfillments", name: 'fulfillments', methods: [HTTPMethod::POST])]
    public function addFulfillment(int $id): Response
    {
        $response = new Response();
        $response->headers->set('Location', "fulfillments/1/edit");
        return $response;
    }

    #[Route("/[:id]/fulfillments/[:fulfillmentId]/edit", name: 'fulfillment.edit')]
    public function showEditFulfillment(int $id, int $fulfillmentId): Response
    {
        return $this->render('exercises/answering/fulfillmentEdit');
    }

    #[Route("/[:id]/fulfillments/[:fulfillmentId]", name: 'fulfillment', methods: [HTTPMethod::PATCH])]
    public function editFulfillment(int $id, int $fulfillmentId): Response
    {
        $response = new Response();
        $response->headers->set('Location', "$fulfillmentId/edit");
        return $response;
    }
}