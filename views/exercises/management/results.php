<?=$this->include("partial.topbar",["title"=>"Managing exercice results","type"=>"results"])?>

<main class="container">
    <table>
        <thead>
        <tr>
            <th>Take</th>
            <th><a href="<?=$this->url("exercises.results.show-question",["exerciceId"=>$this->exerciceId,"resultId"=>160])?>">1</a></th>
            <th><a href="/exercises/41/results/161">2</a></th>
            <th><a href="/exercises/41/results/162">3</a></th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td><a href="<?=$this->url("exercises.fulfillments.show",["exerciceId"=>$this->exerciceId,"fulfillmentId"=>160])?>">2021-12-21 15:35:43 UTC</a></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
        </tr>
        <tr>
            <td><a href="<?=$this->url("exercises.fulfillments.show",["exerciceId"=>$this->exerciceId,"fulfillmentId"=>160])?>">2021-12-21 15:39:55 UTC</a></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
        </tr>
        <tr>
            <td><a href="<?=$this->url("exercises.fulfillments.show",["exerciceId"=>$this->exerciceId,"fulfillmentId"=>160])?>">2021-12-21 15:40:52 UTC</a></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
            <td class="answer"><i class="fa fa-check short"></i></td>
        </tr>
        </tbody>
    </table>
</main>