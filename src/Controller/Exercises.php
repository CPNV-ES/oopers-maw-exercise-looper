<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Exercise;
use App\Entity\ExerciseState;
use App\Form\ExerciseForm;
use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;


#[Route("/exercises", name:"exercises.")]
class Exercises extends Controller
{
    /*-- CREATION --*/
    #[Route("/new", name: 'new', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function new(SQLOperations $operations): Response
    {
        $exercise = new Exercise();
        $form = new ExerciseForm($exercise);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exercise->create($operations);
            return $this->redirectToRoute('exercises.fields.index', ['e_id' => $exercise->getId()], HTTPStatus::HTTP_SEE_OTHER);
        }

        return $this->render('exercises/new', ['form' => $form->renderView()]);
    }

    /*-- ANSWERING / FULFILLMENT --*/
    #[Route("/answering", name: 'answering')]
    public function answering(SQLOperations $operations): Response
    {
        return $this->render('exercises.filling.list',["exercises"=>Exercise::getAllWithDesiredState($operations,ExerciseState::ANSWERING)]);
    }

    /*-- MANAGEMENT / RESULTS --*/
    #[Route("", name: 'index')]
    public function index(SQLOperations $operations): Response
    {
        $exercisesStateMap = Exercise::getAllArrangedByState($operations);
        $questions = Answer::getAll($operations);
        //TODO : REMOVED THIS HACK OMG
        $questionCountByExercises = [];
        foreach ($questions as $question){
            if(!isset($questionCountByExercises[$question->getExercise()->getId()]))
                $questionCountByExercises[$question->getExercise()->getId()] = 0;
            $questionCountByExercises[$question->getExercise()->getId()]++;
        }
        return $this->render('exercises.index',["exercisesStateMap"=>$exercisesStateMap,"questionCountByExercises"=>$questionCountByExercises]);
    }

    #[Route("/[:id]", name: 'update', methods: [HTTPMethod::PUT])]
    public function changExerciseInfo(int $id, SQLOperations $operations): Response
    {
        $exercise = Exercise::getOneByID($operations,$id);
        if($this->request->query->get("state") !== null)
            $exercise->setState(ExerciseState::from($this->request->query->get("state")));
        $exercise->update($operations);
        return $this->redirectToRoute("exercises.index");
    }

    #[Route("/[:id]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteExercise(int $id, SQLOperations $operations): Response
    {
        Exercise::deleteById($operations,$id);
        return $this->redirectToRoute("exercises.index");
    }
}