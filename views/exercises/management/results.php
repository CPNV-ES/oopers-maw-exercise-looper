<?php
use App\Entity\ContentLenghtValidation; ?>
<?=$this->include("partial.topbar",["title"=>"Managing exercice results","type"=>"results"])?>

<main class="container">
    <table>
        <thead>
        <tr>
            <th>Take</th>
            <?php foreach($this->questions as $question): ?>
                <th><a href="<?=$this->url("exercises.results.show-question",["e_id"=>$this->exerciceId,"resultId"=>$question->GetId()])?>"><?=$question->getStatement()?></a></th>
            <?php endforeach; ?>
        </tr>
        </thead>

        <tbody>
            <?php foreach($this->fulfillments as $fulfillment): ?>
            <tr>
                <td><a href="<?=$this->url("exercises.fulfillments.show",["e_id"=>$this->exerciceId,"fulfillmentId"=>$fulfillment->GetId()])?>"><?=$fulfillment->getSubmissionDate()->format("d.m.o G:s")?></a></td>
                <?php foreach($this->answers[$fulfillment->GetId()] as $answerForFulfillment): ?>
                    <?php switch ($answerForFulfillment->getContentLenghtValidation()):
                        case ContentLenghtValidation::VeryGood: ?>
                            <td class="answer"><i class="fa fa-check-double filled"></i></td>
                        <?php break; case ContentLenghtValidation::Sufficient: ?>
                            <td class="answer"><i class="fa fa-check short"></i></td>
                        <?php break; case ContentLenghtValidation::NotGoodEnough: ?>
                            <td class="answer"><i class="fa fa-times empty"></i></td>
                        <?php break;?>
                    <?php endswitch;?>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>