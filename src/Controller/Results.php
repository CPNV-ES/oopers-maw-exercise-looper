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
    public function showExerciceResults(int $e_id, SQLOperations $operations): Response
    {
        $questions = $operations->fetchAll(Question::class,["questionnaires_id"=>$e_id]);
        $fulfillments = $operations->fetchAll(Filling::class,["questionnaires_id"=>$e_id]);
        $answers = [];
        foreach ($fulfillments as $fulfillment){
            $answers[$fulfillment->GetId()] = $operations->fetchAll(Answer::class,["fillings_id"=>$fulfillment->GetId()]);
        }
        return $this->render('exercises.management.results',["exerciceId"=>$e_id,"questions"=>$questions,"fulfillments"=>$fulfillments,"answers"=>$answers]);
    }

    #[Route("/[:resultId]", name: 'show-question')]
    public function showExerciceResult(int $e_id, int $resultId, SQLOperations $operations): Response
    {
        $question = $operations->fetchOneOrThrow(Question::class,["id"=>$resultId]);
        $answers = $operations->fetchAll(Answer::class,["questions_id"=>$question->GetId()]);
        return $this->render('exercises.management.results-by-question',["question"=>$question,"answers"=>$answers]);
    }
}