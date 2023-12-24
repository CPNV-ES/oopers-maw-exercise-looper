<?= $this->include("partial.topbar", ["title" => "Exercise : " . $this->exercise->getTitle(), "type" => "answering"]) ?>

<main class="container">
    <h1>Your take</h1>
    <p>Bookmark this page, it's yours. You'll be able to come back later to finish.</p>
    <?= $this->form ?>
</main>