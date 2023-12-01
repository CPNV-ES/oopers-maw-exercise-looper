<?= $this->include("partial.topbar", ["title" => "Managing exercices", "type" => "results"]) ?>

<main class="container">
    <div class="row">
        <?php foreach (\App\Models\Entities\QuestionnaireState::cases() as $state): ?>
        <?php $questionnaires = $this->questionnairesStateMap[$state->value]??[];?>
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
                    <?php foreach ($questionnaires as $questionnaire): ?>
                        <tr>
                            <td><?= $questionnaire->GetTitle() ?></td>
                            <td>
                                <?php if($questionnaire->canBeReadyForAnswers($this->questionCountByQuestionnaires[$questionnaire->GetId()]??0)) : ?>
                                <a title="Be ready for answers" rel="nofollow" data-method="put" href="/exercises/91?exercise%5Bstatus%5D=answering">
                                    <i class="fa fa-comment"></i>
                                </a>
                                <?php endif; ?>

                                <?php if($questionnaire->canManageFields()) : ?>
                                <a title="Manage fields"
                                   href="<?= $this->url("exercises.fields.show", ["exerciceId" => $questionnaire->GetId()]) ?>"><i
                                            class="fa fa-edit"></i></a>
                                <?php endif; ?>

                                <?php if($questionnaire->canDeleteFields()) : ?>
                                <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                                   href="<?= $this->url("exercises.delete", ["exerciceId" => $questionnaire->GetId()]) ?>"><i
                                            class="fa fa-trash"></i></a>
                                <?php endif; ?>

                                <?php if($questionnaire->canShowResults()) : ?>
                                <a title="Show results" href="<?=$this->url("exercises.results.show",["exerciceId"=>91])?>"><i class="fa fa-chart-bar"></i></a>
                                <?php endif; ?>

                                <?php if($questionnaire->canClose()) : ?>
                                <a title="Close" rel="nofollow" data-method="put"
                                   href="/exercises/7?exercise%5Bstatus%5D=closed"><i class="fa fa-minus-circle"></i></a>
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