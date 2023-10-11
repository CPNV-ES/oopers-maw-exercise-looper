<?php
namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Routing\Annotation\Route;
use \MVC\Http\Response\Response;

#[Route("/exercises")]
class ExercisesManagement extends Controller
{
    #[Route("")]
    public function showExercisesList(): Response
    {
        return $this->render('exercises/management/list');
    }
    #[Route("/[:exerciceid]",methods: [HTTPMethod::PUT])]
    public function changExerciceInfo($exerciceid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../exercises");
        return $response;
    }
    #[Route("/[:exerciseid]",methods: [HTTPMethod::DELETE])]
    public function deleteExercise($exerciseid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../exercises");
        return $response;
    }
    #[Route("/[:exerciceid]/results")]
    public function showExerciceResults($exerciceid): Response
    {
        return $this->render('exercises/management/results');
    }
    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]")]
    public function showFulfillment($exerciceid,$fulfillmentid): Response
    {
        return $this->render('exercises/management/results-by-fulfillment');
    }
    #[Route("/[:exerciceid]/results/[:resultid]")]
    public function showExerciceResult($exerciceid,$resultid): Response
    {
        return $this->render('exercises/management/results-by-question');
    }
}