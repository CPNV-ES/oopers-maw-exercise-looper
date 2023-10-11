<?php
namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;

#[Route("/exercises")]
class ExercisesManagement extends Controller
{
    #[Route("", name: 'exercises')]
    public function showExercisesList(): Response
    {
        return $this->render('exercises/management/list');
    }

    #[Route("/[:exerciceid]", name: 'exercise', methods: [HTTPMethod::PUT])]
    public function changExerciceInfo($exerciceid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../exercises");
        return $response;
    }

    #[Route("/[:exerciseid]", name: 'exercise', methods: [HTTPMethod::DELETE])]
    public function deleteExercise($exerciseid): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../exercises");
        return $response;
    }

    #[Route("/[:exerciceid]/results", name: 'exercise.results')]
    public function showExerciceResults($exerciceid): Response
    {
        return $this->render('exercises/management/results');
    }

    #[Route("/[:exerciceid]/results/[:resultid]", name: 'exercise.result')]
    public function showExerciceResult($exerciceid, $resultid): Response
    {
        return $this->render('exercises/management/results-by-question');
    }

    #[Route("/[:exerciceid]/fulfillments/[:fulfillmentid]", name: 'fulfillment')]
    public function showFulfillment($exerciceid,$fulfillmentid): Response
    {
        return $this->render('exercises/management/results-by-fulfillment');
    }
}