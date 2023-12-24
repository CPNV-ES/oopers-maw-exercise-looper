<?= $this->include("partial.topbar", ["title" => "List to answer", "type" => "answering"]) ?>

<main class="container">
    <div class="answering-list">
        <?php
        foreach ($this->exercises as $exercise): ?>
            <div class="column card">
                <div class="title"><?= $exercise->getTitle() ?></div>
                <a class="button"
                   href="<?= $this->url("exercises.fulfillments.new", ["exercise_id" => $exercise->getId()]) ?>">Take
                    it</a>
            </div>
        <?php
        endforeach; ?>
    </div>
</main>