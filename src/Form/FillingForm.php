<?php

namespace App\Form;

use App\Entity\Answer;
use MVC\Form\AbstractForm;
use MVC\Form\Field\EntityField;

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
                'attributes' => [
                    'class' => ['field']
                ]
            ]);
    }
}