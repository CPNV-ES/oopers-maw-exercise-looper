<?=$this->include("partial.topbar",["title"=>"Managing exercise ".$this->exercise->getTitle()." - results by question","type"=>"results"])?>

<main class="container">
    <h1><?=$this->question->getStatement()?></h1>
    <table>
        <thead>
        <tr>
            <th>Take</th>
            <th>Content</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($this->answers as $answer): ?>
        <tr>
            <td><a href="<?=$this->url("exercises.fulfillments.show",["exercise_id"=>$this->question->getExercise()->getId(),"filling_id"=>$answer->getFilling()->getId()])?>"><?=$answer->getFilling()->getSubmissionDate()->format("Y-m-d H:i")?></a></td>
            <td><?=$answer->getContent()?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>