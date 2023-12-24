<?php

namespace App\Form;

use MVC\Form\AbstractForm;
use MVC\Form\Field\TextField;

class ExerciseForm extends AbstractForm
{

    public function __construct(object $entity)
    {
        parent::__construct($entity);
        $this->addOption('view_template', 'exercises/form');
        $this->buildForm();
    }

    public function buildForm(): void
    {
        $this->add('title', TextField::class, [
            'label' => 'Title',
            'constraint' => function (string $value) {
                if (strlen($value) > 255) {
                    return ["message" => "The title field is too long! It must be less or equals to 255 characters."];
                }
                return [];
            },
            'attributes' => [
                'class' => ['field']
            ]
        ]);
    }
}