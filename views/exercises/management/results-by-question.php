<?=$this->include("partial.topbar",["title"=>"Results by question","type"=>"results"])?>

<main class="container">
    <h1><?=$this->question->GetStatement()?></h1>
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
            <td><a href="<?=$this->url("exercises.fulfillments.show",["e_id"=>$this->question->getExercise()->getId(),"fulfillmentId"=>$answer->getFilling()->getId()])?>"><?=$answer->getFilling()->getSubmissionDate()->format("d.m.o G:s")?></a></td>
            <td><?=$answer->getContent()?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>