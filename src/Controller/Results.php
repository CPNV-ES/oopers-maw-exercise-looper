<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Exercise;
use App\Entity\Filling;
use App\Entity\Question;
use MVC\Http\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\Driver\MySQL\SQLOperations;

#[Route("/exercises/[:e_id]/results", name:"exercises.results.")]
class Results extends Controller
{
    #[Route("/", name: 'show')]
    public function showExerciseResults(int $e_id, SQLOperations $operations): Response
    {
        $exercise = Exercise::getOneByID($operations, $e_id);
        $questions = Question::getAllFromExercise($operations, $e_id);
        $fulfillments = Filling::getAllFromExercise($operations,$e_id);
        $answers = [];
        foreach ($fulfillments as $fulfillment){
            $answers[$fulfillment->getId()] = Answer::getAllFromFilling($operations,$fulfillment->getId());
        }
        return $this->render('exercises.management.results',["exercise"=>$exercise,"questions"=>$questions,"fulfillments"=>$fulfillments,"answers"=>$answers]);
    }

    #[Route("/[:resultId]", name: 'show-question')]
    public function showExerciseResult(int $e_id, int $resultId, SQLOperations $operations): Response
    {
        $exercise = Exercise::getOneByID($operations, $e_id);
        $question = Question::getOneByID($operations, $resultId);
        $answers = Answer::getAllFromQuestion($operations,$question->GetId());
        return $this->render('exercises.management.results-by-question',["exercise"=>$exercise,"question"=>$question,"answers"=>$answers]);
    }
}