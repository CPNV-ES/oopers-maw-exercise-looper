<?=$this->include("partial.topbar",["title"=>"Your take","type"=>"answering"])?>

<main class="container">
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks</p>
    <form action="<?=$this->url("exercises.fulfillments.create",["exerciceId"=>$this->exerciceId])?>" accept-charset="UTF-8" method="post">

        <input type="hidden" value="17" name="fulfillment[answers_attributes][][field_id]"
               id="fulfillment_answers_attributes__field_id">
        <div class="field">
            <label for="fulfillment_answers_attributes__value">dsadasd</label>
            <input type="text" name="fulfillment[answers_attributes][][value]"
                   id="fulfillment_answers_attributes__value">

        </div>

        <div class="actions">
            <input type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>
</main>