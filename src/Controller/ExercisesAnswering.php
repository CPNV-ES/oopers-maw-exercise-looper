<?php

use MVC\Http\Controller\Controller;
use MVC\Http\Routing\Annotation\Route;
use \MVC\Http\Response\Response;


#[Route("/exercises")]
class ExercisesAnswering extends Controller
{
    #[Route("/answering")]
    function showAnsweringList(): Response
    {
        return $this->render('exercises/answering/list');
    }
    #[Route("/[:id]/fulfillments/new")]
    function showNewFulfillment(): Response
    {
        return $this->render('exercises/answering/fulfillment');
    }
}