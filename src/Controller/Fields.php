<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\Question;
use App\Form\QuestionForm;
use MVC\Http\Controller\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\SQLOperations;


#[Route("/exercises/[:e_id]/fields", name:"exercises.fields.")]
class Fields extends Controller
{
    #[Route("", name: "index", methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function index(int $e_id, SQLOperations $operations): Response
    {
        $exercise = Exercise::getOneByID($operations,$e_id);
        $question = (new Question())->setExercise($exercise);
        $form = new QuestionForm($question);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->create($operations);
            return $this->redirectToRoute('exercises.fields.index', ['e_id' => $e_id], HTTPStatus::HTTP_SEE_OTHER);
        }

        $questions = Question::getAllFromExercise($operations,$e_id);

        return $this->render('exercises.field.index',[
            'exercise' => $exercise,
            'questions' => $questions,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:fieldId]/edit", name: 'edit', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function edit(int $e_id, int $fieldId, SQLOperations $operations): Response
    {
        $exercise = Exercise::getOneByID($operations,$e_id);
        $question = Question::getOneByID($operations, $fieldId);
        $form = new QuestionForm($question);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->update($operations);
            return $this->redirectToRoute('exercises.fields.index', ['e_id' => $e_id], HTTPStatus::HTTP_SEE_OTHER);
        }

        $questions = Question::getAllFromExercise($operations,$e_id);

        return $this->render('exercises.field.edit',[
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:fieldId]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteField(int $e_id, int $fieldId, SQLOperations $operations): Response
    {
        Question::deleteById($operations, $fieldId);
        return $this->redirectToRoute("exercises.fields.index",["e_id"=>$e_id,"fieldId"=>$fieldId]);
    }
}