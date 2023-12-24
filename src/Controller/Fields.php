<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\Question;
use App\Form\QuestionForm;
use MVC\Http\Controller;
use MVC\Http\HTTPMethod;
use MVC\Http\HTTPStatus;
use MVC\Http\Response;
use MVC\Http\Routing\Annotation\Route;
use ORM\Driver\MySQL\SQLOperations;


#[Route("/exercises/[:exercise_id]/fields", name: "exercises.fields.")]
class Fields extends Controller
{
    #[Route("", name: "index", methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function index(Exercise $exercise, SQLOperations $operations): Response
    {
        //TODO : Fix this when newer version of ORM is merged (it will be automatically assigned)
        $exercise->setQuestions(Question::getAllFromExercise($operations, $exercise->getId()));
        $question = (new Question())->setExercise($exercise);
        $form = new QuestionForm($question);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->create($operations);
            return $this->redirectToRoute(
                'exercises.fields.index',
                ['exercise_id' => $exercise->getId()],
                HTTPStatus::HTTP_SEE_OTHER
            );
        }

        return $this->render('exercises.field.index', [
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:question_id]/edit", name: 'edit', methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function edit(Exercise $exercise, Question $question, SQLOperations $operations): Response
    {
        $form = new QuestionForm($question);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->update($operations);
            return $this->redirectToRoute(
                'exercises.fields.index',
                ['exercise_id' => $exercise->getId()],
                HTTPStatus::HTTP_SEE_OTHER
            );
        }

        return $this->render('exercises.field.edit', [
            'exercise' => $exercise,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:question_id]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteField(int $exercise_id, int $question_id, SQLOperations $operations): Response
    {
        Question::deleteById($operations, $question_id);
        return $this->redirectToRoute(
            "exercises.fields.index",
            ["exercise_id" => $exercise_id, "fieldId" => $question_id]
        );
    }
}