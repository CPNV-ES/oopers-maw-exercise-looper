<?php

use MVC\Http\Controller\Controller;
use MVC\Http\Routing\Annotation\Route;
use \MVC\Http\Response\Response;


#[Route("/exercises")]
class ExercicesAnswering extends Controller
{
    #[Route("/answering")]
    function showAnsweringList(): Response
    {
        return $this->render('exercises/answering/list');
    }
}