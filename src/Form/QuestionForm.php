<?php

namespace App\Form;

use App\Entity\Question;
use App\Entity\QuestionKind;
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
                'constraint' => function (string $value) {
                    if (strlen($value) > 511) {
                        return ["message" => "The statement field is too long! It must be less or equals to 511 characters."];
                    }
                    return [];
                },
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
            new ChoiceOption(QuestionKind::SINGLE_LINE_TEXT->value, 'Single line text'),
            new ChoiceOption(QuestionKind::LIST_OF_SINGLE_LINES->value, 'List of single lines'),
            new ChoiceOption(QuestionKind::MULTILINE_TEXT->value, 'Multi-line text'),
        ];
    }
}