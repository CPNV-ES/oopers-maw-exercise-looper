<?= $this->include(
    "partial.topbar",
    ["title" => "Managing exercise " . $this->exercise->getTitle() . " - results by fulfillment", "type" => "results"]
) ?>
<main class="container">
    <h1><?= $this->filling->getSubmissionDate()->format("Y-m-d H:i") ?></h1>
    <dl class="answer">
        <?php
        foreach ($this->filling->getAnswers() as $answer): ?>
            <dt><?= $answer->getQuestion()->getStatement() ?></dt>
            <dd><?= $answer->getContent() ?></dd>
        <?php
        endforeach; ?>
    </dl>
</main>