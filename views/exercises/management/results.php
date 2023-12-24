<?php

use App\Entity\ContentLengthValidation; ?>
<?= $this->include(
    "partial.topbar",
    ["title" => "Managing exercise " . $this->exercise->getTitle(), "type" => "results"]
) ?>
<main class="container">
    <table>
        <thead>
        <tr>
            <th>Take</th>
            <?php
            foreach ($this->questions as $question): ?>
                <th><a href="<?= $this->url(
                        "exercises.results.show-question",
                        ["exercise_id" => $this->exercise->getId(), "question_id" => $question->getId()]
                    ) ?>"><?= $question->getStatement() ?></a></th>
            <?php
            endforeach; ?>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($this->fulfillments as $fulfillment): ?>
            <tr>
                <td><a href="<?= $this->url(
                        "exercises.fulfillments.show",
                        ["exercise_id" => $this->exercise->getId(), "filling_id" => $fulfillment->getId()]
                    ) ?>"><?= $fulfillment->getSubmissionDate()->format("Y-m-d H:i") ?></a></td>
                <?php
                foreach ($this->answers[$fulfillment->getId()] as $answerForFulfillment): ?>
                    <?php
                    switch ($answerForFulfillment->getContentLenghtValidation()):
                        case ContentLengthValidation::VERY_GOOD: ?>
                            <td class="answer"><i class="fa fa-check-double filled"></i></td>
                            <?php
                            break;
                        case ContentLengthValidation::SUFFICIENT: ?>
                            <td class="answer"><i class="fa fa-check short"></i></td>
                            <?php
                            break;
                        case ContentLengthValidation::NOT_GOOD_ENOUGH: ?>
                            <td class="answer"><i class="fa fa-times empty"></i></td>
                            <?php
                            break; ?>
                        <?php
                    endswitch; ?>
                <?php
                endforeach; ?>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
</main>