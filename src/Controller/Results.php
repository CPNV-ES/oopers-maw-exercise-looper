<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Filling;
use App\Entity\Question;
use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;

#[Route("/exercises/[:e_id]/results", name:"exercises.results.")]
class Results extends Controller
{
    #[Route("/", name: 'show')]
    public function showExerciseResults(int $e_id, SQLOperations $operations): Response
    {
        $questions = Question::getAllFromExercise($operations, $e_id);
        $fulfillments = Filling::getAllFromExercise($operations,$e_id);
        $answers = [];
        foreach ($fulfillments as $fulfillment){
            $answers[$fulfillment->getId()] = Answer::getAll($operations,["fillings_id"=>$fulfillment->getId()]);
        }
        return $this->render('exercises.management.results',["exerciseId"=>$e_id,"questions"=>$questions,"fulfillments"=>$fulfillments,"answers"=>$answers]);
    }

    #[Route("/[:resultId]", name: 'show-question')]
    public function showExerciseResult(int $e_id, int $resultId, SQLOperations $operations): Response
    {
        $question = Question::getOneByID($operations, $resultId);
        $answers = Answer::getAll($operations,["questions_id"=>$question->GetId()]);
        return $this->render('exercises.management.results-by-question',["question"=>$question,"answers"=>$answers]);
    }
}