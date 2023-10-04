<?php

namespace App\Form;

use App\Entity\Questionnaire;
use Doctrine\Common\Collections\ArrayCollection;
use MVC\Form\AbstractType;
use MVC\Form\Type\TextType;
use MVC\Http\Request;

/**
 * @method addOption(string $key, string|ArrayCollection|array $option)
 * @property $builder
 */
#[FormConfig(data_class: Questionnaire::class)]
class QuestionnaireForm extends AbstractType
{

	public function __construct(Questionnaire $questionnaire, Request $request)
	{
		parent::__construct($questionnaire, $request);
		$this->addOption('view_template', 'questionnaire.form');
	}

	public function buildForm(): void
	{
		$this->builder
			// Title is the property name in App\Entity\Questionnaire
			// TextType is the class that represent the <input> html tag
			->add('title', TextType::class)
		;
	}

}