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
            <td><a href="<?=$this->url("exercises.fulfillments.show",["exerciceId"=>$this->question->GetQuestionnaire()->GetId(),"fulfillmentId"=>$answer->GetFilling()->GetId()])?>"><?=$answer->GetFilling()->GetSubmissionDate()->format("d.m.o G:s")?></a></td>
            <td><?=$answer->GetContent()?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>