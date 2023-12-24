<?php

namespace App\Form;

use App\Entity\Answer;
use MVC\Form\AbstractForm;
use MVC\Form\Field\EntityField;
use MVC\Form\Field\TextAreaField;
use MVC\Form\Field\TextField;

class FillingForm extends AbstractForm
{

    public function __construct(object $entity)
    {
        parent::__construct($entity);
        $this->addOption('view_template', 'exercises/filling/form');
        $this->buildForm();
    }

    public function buildForm(): void
    {
        $this
            ->add('answers', EntityField::class, [
                'label' => false,
                'entity_class' => Answer::class,
                'entity_value' => 'content',
                'entity_identifier' => 'question.id',
                'entity_label' => 'question',
                'entity_type' => function (Answer $answer) {
                    if ($answer->isMultiline()) return TextAreaField::class;
                    return TextField::class;
                },
                'constraint'=> function(string $value){
                    if(strlen($value) > 1023) return ["message"=>"The answer field is too long! It must be less or equals to 1023 characters."];
                    return [];
                },
                'attributes' => [
                    'class' => ['field']
                ]
            ]);
    }
}