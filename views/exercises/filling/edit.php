<?=$this->include("partial.topbar",["title"=>"Your take","type"=>"answering"])?>

<main class="container">
    <h1>Your take</h1>
    <p>Bookmark this page, it's yours. You'll be able to come back later to finish.</p>

    <form action="<?=$this->url("exercises.fulfillments.update",["e_id"=>$this->exerciceId,"fulfillmentId"=>$this->fulfillmentId])?>" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden"
                                                                                             value="✓"><input
                type="hidden" name="_method" value="patch"><input type="hidden" name="authenticity_token"
                                                                  value="lCQt3QBUPBb8d9rpKYH7nHks17MeSK/oDRRZN0swhyTKA02cSf5Y/5hHpZUkHpsOkSDfycZVRYprER/M1Ov4kg==">


        <input type="hidden" value="1872" name="fulfillment[answers_attributes][1872][id]"
               id="fulfillment_answers_attributes_1872_id">
        <input type="hidden" value="17" name="fulfillment[answers_attributes][1872][field_id]"
               id="fulfillment_answers_attributes_1872_field_id">
        <div class="field">
            <label for="fulfillment_answers_attributes_1872_value">dsadasd</label>
            <input type="text" value="a" name="fulfillment[answers_attributes][1872][value]"
                   id="fulfillment_answers_attributes_1872_value">

        </div>

        <div class="actions">
            <input type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>
</main>