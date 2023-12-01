<?php

namespace App\Form;

use App\Entity\Question;
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
            new ChoiceOption(Question::SINGLE_LINE_TYPE, 'Single line text'),
            new ChoiceOption(Question::MULTI_SINGLE_LINE_TYPE, 'List of single lines'),
            new ChoiceOption(Question::MULTILINE_TYPE, 'Multi-line text'),
        ];
    }
}