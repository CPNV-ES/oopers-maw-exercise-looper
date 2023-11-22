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
            'attributes' => [
                'class' => ['field']
            ]
        ]);
    }
}