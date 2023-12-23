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

#[Route("/exercises/[:exercise_id]/results", name:"exercises.results.")]
class Results extends Controller
{
    #[Route("/", name: 'show')]
    public function showExerciseResults(Exercise $exercise, SQLOperations $operations): Response
    {
        $questions = Question::getAllFromExercise($operations, $exercise->getId());
        $fulfillments = Filling::getAllFromExercise($operations,$exercise->getId());
        $answers = [];
        foreach ($fulfillments as $fulfillment){
            $answers[$fulfillment->getId()] = Answer::getAllFromFilling($operations,$fulfillment->getId());
        }
        return $this->render('exercises.management.results',["exercise"=>$exercise,"questions"=>$questions,"fulfillments"=>$fulfillments,"answers"=>$answers]);
    }

    #[Route("/[:question_id]", name: 'show-question')]
    public function showExerciseResult(Exercise $exercise, Question $question, SQLOperations $operations): Response
    {
        $answers = Answer::getAllFromQuestion($operations,$question->GetId());
        return $this->render('exercises.management.results-by-question',["exercise"=>$exercise,"question"=>$question,"answers"=>$answers]);
    }
}