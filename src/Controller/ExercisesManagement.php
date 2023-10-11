<?php

use MVC\Http\Controller\Controller;
use MVC\Http\Routing\Annotation\Route;
use \MVC\Http\Response\Response;

#[Route("/exercises")]
class ExercisesManagement extends Controller
{
    #[Route("")]
    function showExercisesList(): Response
    {
        return $this->render('exercises/management/list');
    }
    #[Route("/[:exerciceid]/results")]
    function showExerciceResults($exerciceid): Response
    {
        return $this->render('exercises/management/results');
    }
    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]")]
    function showFulfillment($exerciceid,$fulfillmentid): Response
    {
        return $this->render('exercises/management/results-by-fulfillment');
    }
    #[Route("/[:exerciceid]/results/[:resultid]")]
    function showExerciceResult($exerciceid,$resultid): Response
    {
        return $this->render('exercises/management/results-by-question');
    }
}