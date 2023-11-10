<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;

#[Route("/exercises/[:exerciceId]/fulfillments", name:"exercises.fulfillments.")]
class Fulfillments extends Controller
{

    #[Route("/new", name: 'new')]
    public function showNewFulfillment(int $exerciceId): Response
    {
        return $this->render('exercises.answering.fulfillment',["exerciceId"=>$exerciceId]);
    }

    #[Route("/", name: 'create', methods: [HTTPMethod::POST])]
    public function addFulfillment(int $exerciceId): Response
    {
        $fulfillmentId = 0;
        return $this->redirectToRoute("exercises.fulfillments.edit",["exerciceId"=>$exerciceId,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]/edit", name: 'edit')]
    public function showEditFulfillment(int $exerciceId, int $fulfillmentId): Response
    {
        return $this->render('exercises.answering.fulfillmentEdit',["exerciceId"=>$exerciceId,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]", name: 'update', methods: [HTTPMethod::PATCH])]
    public function editFulfillment(int $exerciceId, int $fulfillmentId): Response
    {
        return $this->redirectToRoute("exercises.fulfillments.edit",["exerciceId"=>1,"fulfillmentId"=>1]);
    }

    #[Route("/[:fulfillmentId]", name: 'show')]
    public function showFulfillment(int $exerciceId, int $fulfillmentId): Response
    {
        return $this->render('exercises.management.results-by-fulfillment');
    }
}