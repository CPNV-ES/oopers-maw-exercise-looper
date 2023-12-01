<?php

namespace App\Controller;

use App\Models\Entities\Questionnaire;
use App\Models\Services\DBOperationsProvider;
use MVC\Http\Controller\Controller;
use MVC\Http\Exception\NotFoundException;
use MVC\Http\HTTPMethod;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;


#[Route("/exercises", name:"exercises.")]
class Exercises extends Controller
{
    /*-- CREATION --*/
    #[Route("/new", name: 'new')]
    public function showExerciseCreation(): Response
    {
        return $this->render('exercises.creation.new-exercice');
    }

    #[Route("", name: 'create', methods: [HTTPMethod::POST])]
    public function createExercise(): Response
    {
        $questionnaire = new Questionnaire();
        $questionnaire->setTitle("TEST!");
        try {
            $questionnaire->setId(DBOperationsProvider::GetUnique()->create($questionnaire));
            return $this->redirectToRoute("exercises.fields.show",["exerciceId"=>$questionnaire->getId()]);
        }catch (\Exception $e){
            //Handle SQL Error (like unique name already exists
            return $this->render('exercises.creation.new-exercice');
        }
    }

    /*-- ANSWERING / FULFILLMENT --*/
    #[Route("/answering", name: 'answering')]
    public function index(): Response
    {
        $questionnaires = DBOperationsProvider::GetUnique()->fetchAll(Questionnaire::class);
        return $this->render('exercises.answering.list',["questionnaires"=>$questionnaires]);
    }

    /*-- MANAGEMENT / RESULTS --*/
    #[Route("", name: 'show')]
    public function showExercisesList(): Response
    {
        $questionnaires = DBOperationsProvider::GetUnique()->fetchAll(Questionnaire::class);
        return $this->render('exercises.management.list');
    }

    #[Route("/[:exerciceId]", name: 'update', methods: [HTTPMethod::PUT])]
    public function changExerciceInfo(int $exerciceId): Response
    {
        $questionnaire = DBOperationsProvider::GetUnique()->fetchOne(Questionnaire::class,["id"=>$exerciceId]);
        return $this->redirectToRoute("exercises.show");
    }

    #[Route("/[:exerciceId]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteExercise(int $exerciceId): Response
    {
        DBOperationsProvider::GetUnique()->delete(Questionnaire::class,$exerciceId);
        return $this->redirectToRoute("exercises.show");
    }
}