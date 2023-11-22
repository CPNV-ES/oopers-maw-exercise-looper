<?=$this->include("partial.topbar",["title"=>"Edit fields of a new exercice","type"=>"managing"])?>

<main class="container">
    <div class="row">
        <section class="column">
            <h1>Fields</h1>
            <table class="records">
                <thead>
                <tr>
                    <th>Label</th>
                    <th>Value kind</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($this->questions as $question): ?>
                    <tr>
                        <td><?= $question->getStatement() ?></td>
                        <td><?= $question->getKind() ?></td>
                        <td>
                            <a title="Edit" href="<?= $this->url("exercises.fields.edit", ["e_id" => $this->exercise->getId(), "fieldId" => 1])?>"><i class="fa fa-edit"></i></a>
                            <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                               href="<?= $this->url("exercises.fields.delete", ["e_id" => $this->exercise->getId(), "fieldId" => 1])?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button"
               rel="nofollow" data-method="put" href="<?= $this->url("exercises.update", ["id" => $this->exercise->getId()]) ?>?exercise%5Bstatus%5D=answering"><i
                        class="fa fa-comment"></i> Complete and be ready for answers</a>

        </section>
        <section class="column">
            <h1>New Field</h1>
            <?= $this->form ?>
        </section>
    </div>
</main>