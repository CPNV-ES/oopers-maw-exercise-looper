<?=$this->include("partial.topbar",["title"=>"Results by fulfillment","type"=>"results"])?>
<main class="container">
    <h1><?=$this->filling->getSubmissionDate()->format("d.m.o G:s")?></h1>
    <dl class="answer">
    <?php foreach($this->filling->getAnswers() as $answer): ?>
        <dt><?=$answer->getQuestion()->getStatement()?></dt>
        <dd><?=$answer->getContent()?></dd>
    <?php endforeach; ?>
    </dl>
</main>