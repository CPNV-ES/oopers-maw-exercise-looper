<?php

namespace App\Form;

use MVC\Form\AbstractForm;
use MVC\Form\Field\ChoiceField;
use MVC\Form\Field\ChoiceOption;
use MVC\Form\Field\TextField;

class QuestionForm extends AbstractForm
{

    public function __construct(object $entity)
    {
        parent::__construct($entity);
        $this->addOption('view_template', 'exercises/field/form');
        $this->buildForm();
    }

    public function buildForm(): void
    {
        $this
            ->add('statement', TextField::class, [
                'label' => 'Label',
                'attributes' => [
                    'class' => ['field']
                ]
            ])
            ->add('kind', ChoiceField::class, [
                'label' => 'Value kind',
                'choices' => $this->getChoices(),
                'attributes' => [
                    'class' => ['field']
                ]
            ]);
    }

    private function getChoices(): array
    {
        return [
            new ChoiceOption('Answering', 'Single line text'),
            new ChoiceOption('ListOfSingleLines', 'List of single lines'),
            new ChoiceOption('MultilineText', 'Multi-line text'),
        ];
    }
}