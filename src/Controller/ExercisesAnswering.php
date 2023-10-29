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
    public function showAnsweringList(): Response
    {
        return $this->render('exercises/answering/list');
    }

    #[Route("/[:exerciceid]/fulfillments/new", name: 'fulfillment.new')]
    public function showNewFulfillment($exerciceid): Response
    {
        return $this->render('exercises/answering/fulfillment');
    }

    #[Route("/[:exerciceid]/fulfillments", name: 'fulfillments', methods: [HTTPMethod::POST])]
    public function addFulfillment($exerciceid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "fulfillments/1/edit");
        return $response;
    }

    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]/edit", name: 'fulfillment.edit')]
    public function showEditFulfillment($exerciceid, $fulfillmentid): Response
    {
        return $this->render('exercises/answering/fulfillmentEdit');
    }

    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]", name: 'fulfillment', methods: [HTTPMethod::PATCH])]
    public function editFulfillment($exerciceid, $fulfillmentid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "$fulfillmentid/edit");
        return $response;
    }
}