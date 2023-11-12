<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;


#[Route("/exercises/[:exerciceId]/results", name:"exercises.results.")]
class Results extends Controller
{
    #[Route("/", name: 'show')]
    public function showExerciceResults(int $exerciceId): Response
    {
        return $this->render('exercises.management.results',["exerciceId"=>$exerciceId]);
    }

    #[Route("/[:resultId]", name: 'show-question')]
    public function showExerciceResult(int $exerciceId, int $resultId): Response
    {
        return $this->render('exercises.management.results-by-question',["exerciceId"=>$exerciceId,"resultId"=>$resultId]);
    }
}