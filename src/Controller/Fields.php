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
    #[Route("", name: "show", methods: [HTTPMethod::GET, HTTPMethod::POST])]
    public function show(int $e_id, SQLOperations $operations): Response
    {
        $exercise = $operations->fetchOne(Exercise::class, ['id' => $e_id]);
        $question = (new Question())->setQuestionnaire($exercise);
        $form = new QuestionForm($question);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operations->create($question);
            return $this->redirectToRoute('exercises.fields.show', ['e_id' => $e_id], HTTPStatus::HTTP_SEE_OTHER);
        }

        $questions = $operations->fetchAll(Question::class, ['questionnaires_id' => $e_id]);

        return $this->render('exercises.creation.fields',[
            'exercise' => $exercise,
            'questions' => $questions,
            'form' => $form->renderView()
        ]);
    }

    #[Route("/[:fieldId]/edit", name: 'edit')]
    public function showFieldEdition(int $e_id, int $fieldId): Response
    {
        return $this->render('exercises.creation.field-edit',["exerciceId"=>$e_id,"fieldId"=>$fieldId]);
    }

    #[Route("[:fieldId]", name: 'update', methods: [HTTPMethod::POST])]
    public function editField(int $e_id, int $fieldId): Response
    {
        return $this->redirectToRoute("exercises.fields.list",["exerciceId"=>$e_id]);
    }

    #[Route("[:fieldId]", name: 'delete', methods: [HTTPMethod::DELETE])]
    public function deleteField(int $e_id, int $fieldId): Response
    {
        return $this->redirectToRoute("exercises.fields.list",["exerciceId"=>$e_id,"fieldId"=>$fieldId]);
    }
}