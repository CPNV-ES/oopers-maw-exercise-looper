<?php

namespace App\Repository;

use App\Entity\QuestionnaireState;
use ORM\Repository\EntityRepository;

/**
 * @method find(int $id)
 * @method findOneBy(string[] $criteria)
 * @method findAll(string $order)
 * @method findBy(string[] $criteria, string $order)
 */
class QuestionnaireStateRepository extends EntityRepository
{

	public function __construct()
	{
		parent::__construct(entity_class: QuestionnaireState::class);
	}

}