<?= $this->include("partial.topbar", ["title" => "Exercise : " . $this->exercise->getTitle(), "type" => "answering"]) ?>

<main class="container">
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks</p>
    <?= $this->form ?>
</main>