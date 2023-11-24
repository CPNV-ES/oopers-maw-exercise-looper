<?php

namespace App\Controller;

use App\Models\Entities\Answer;
use App\Models\Entities\Filling;
use App\Models\Entities\Question;
use App\Models\Entities\Questionnaire;
use App\Models\Services\DBOperationsProvider;
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
        $questions = DBOperationsProvider::GetUnique()->fetchAll(Question::class,["questionnaires_id"=>$exerciceId]);
        $fulfillments = DBOperationsProvider::GetUnique()->fetchAll(Filling::class,["questionnaires_id"=>$exerciceId]);
        $answers = [];
        foreach ($fulfillments as $fulfillment){
            $answers[$fulfillment->GetId()] = DBOperationsProvider::GetUnique()->fetchAll(Answer::class,["fillings_id"=>$fulfillment->GetId()]);
        }
        return $this->render('exercises.management.results',["exerciceId"=>$exerciceId,"questions"=>$questions,"fulfillments"=>$fulfillments,"answers"=>$answers]);
    }

    #[Route("/[:resultId]", name: 'show-question')]
    public function showExerciceResult(int $exerciceId, int $resultId): Response
    {
        $question = DBOperationsProvider::GetUnique()->fetchOneOrThrow(Question::class,["id"=>$resultId]);
        $answers = DBOperationsProvider::GetUnique()->fetchAll(Answer::class,["questions_id"=>$question->GetId()]);
        return $this->render('exercises.management.results-by-question',["question"=>$question,"answers"=>$answers]);
    }
}