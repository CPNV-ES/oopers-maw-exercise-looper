<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Routing\Annotation\Route;
use MVC\Http\Response\Response;


#[Route("/exercises")]
class ExercisesAnswering extends Controller
{
    #[Route("/answering")]
    public function showAnsweringList(): Response
    {
        return $this->render('exercises/answering/list');
    }

    #[Route("/[:exerciceid]/fulfillments/new")]
    public function showNewFulfillment($exerciceid): Response
    {
        return $this->render('exercises/answering/fulfillment');
    }

    #[Route("/[:exerciceid]/fulfillments", methods: [HTTPMethod::POST])]
    public function addFulfillment($exerciceid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "fulfillments/1/edit");
        return $response;
    }

    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]/edit")]
    public function showEditFulfillment($exerciceid, $fulfillmentid): Response
    {
        return $this->render('exercises/answering/fulfillmentEdit');
    }

    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]", methods: [HTTPMethod::POST])]
    public function editFulfillment($exerciceid, $fulfillmentid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "$fulfillmentid/edit");
        return $response;
    }
}