<?=$this->include("partial.topbar",["title"=>"List to answer","type"=>"answering"])?>

<main class="container">
    <div class="answering-list">
        <?php foreach($this->questionnaires as $questionnaire): ?>
        <div class="column card">
            <div class="title"><?=$questionnaire->getTitle()?></div>
            <a class="button" href="<?=$this->url("exercises.fulfillments.new",["e_id"=>$questionnaire->getId()])?>">Take it</a>
        </div>
        <?php endforeach; ?>
    </div>
</main>