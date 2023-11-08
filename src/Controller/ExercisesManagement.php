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

    #[Route("/[:id]", name: 'exercise', methods: [HTTPMethod::PUT])]
    public function changExerciceInfo(int $id): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../exercises");
        return $response;
    }

    #[Route("/[:id]", name: 'exercise', methods: [HTTPMethod::DELETE])]
    public function deleteExercise(int $id): Response
    {
        $response = new Response();
        $response->headers->set('Location', "../exercises");
        return $response;
    }

    #[Route("/[:id]/results", name: 'exercise.results')]
    public function showExerciceResults(int $id): Response
    {
        return $this->render('exercises/management/results');
    }

    #[Route("/[:id]/results/[:resultId]", name: 'exercise.result')]
    public function showExerciceResult(int $id, int $resultId): Response
    {
        return $this->render('exercises/management/results-by-question');
    }

    #[Route("/[:id]/fulfillments/[:fulfillmentId]", name: 'fulfillment')]
    public function showFulfillment(int $id, int $fulfillmentId): Response
    {
        return $this->render('exercises/management/results-by-fulfillment');
    }
}