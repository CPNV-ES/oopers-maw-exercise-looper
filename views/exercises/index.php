<?= $this->include("partial.topbar", ["title" => "Managing exercises", "type" => "results"]) ?>

<main class="container">
    <div class="row">
        <?php foreach (\App\Entity\ExerciseState::cases() as $state): ?>
        <?php $exercises = $this->exercisesStateMap[$state->value]??[];?>
            <section class="column">
                <h1><?= $state->value ?></h1>
                <table class="records">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($exercises as $exercise): ?>
                        <tr>
                            <td><?= $exercise->getTitle() ?></td>
                            <td>
                                <?php if($exercise->canBeReadyForAnswers($this->questionCountByExercises[$exercise->getId()]??0)) : ?>
                                <a title="Be ready for answers" rel="nofollow" data-method="put" href="<?=$this->url("exercises.update",["id"=>$exercise->getId()])."?state=". \App\Entity\ExerciseState::ANSWERING->value?>">
                                    <i class="fa fa-comment"></i>
                                </a>
                                <?php endif; ?>

                                <?php if($exercise->canManageFields()) : ?>
                                <a title="Manage fields"
                                   href="<?= $this->url("exercises.fields.index", ["e_id" => $exercise->getId()]) ?>"><i
                                            class="fa fa-edit"></i></a>
                                <?php endif; ?>

                                <?php if($exercise->canDeleteFields()) : ?>
                                <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                                   href="<?= $this->url("exercises.delete", ["id" => $exercise->getId()]) ?>"><i
                                            class="fa fa-trash"></i></a>
                                <?php endif; ?>

                                <?php if($exercise->canShowResults()) : ?>
                                <a title="Show results" href="<?=$this->url("exercises.results.show",["e_id"=>$exercise->getId()])?>"><i class="fa fa-chart-bar"></i></a>
                                <?php endif; ?>

                                <?php if($exercise->canClose()) : ?>
                                <a title="Close" rel="nofollow" data-method="put"
                                   href="<?=$this->url("exercises.update",["id"=>$exercise->getId()])."?state=". \App\Entity\ExerciseState::CLOSED->value?>"><i class="fa fa-minus-circle"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endforeach; ?>
    </div>
</main>