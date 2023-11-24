<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;

#[Route("/exercises/[:exerciseId]/fulfillments", name:"exercises.fulfillments.")]
class Fulfillments extends Controller
{

    #[Route("/new", name: 'new', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function new(int $exerciseId, SQLOperations $operations): Response
    {
        return $this->render('exercises.answering.fulfillment',["exerciceId"=>$exerciceId]);
    }

    #[Route("/", name: 'create', methods: [HTTPMethod::POST])]
    public function addFulfillment(int $exerciseId): Response
    {
        $fulfillmentId = 0;
        return $this->redirectToRoute("exercises.fulfillments.edit",["exerciceId"=>$exerciseId,"fulfillmentId"=>$fulfillmentId]);
    }

    #[Route("/[:fulfillmentId]/edit", name: 'edit')]
    public function showEditFulfillment(int $exerciseId, int $fulfillmentId): Response
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