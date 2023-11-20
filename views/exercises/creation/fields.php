<?=$this->include("partial.topbar",["title"=>"Edit fields of a new exercice","type"=>"managing"])?>

<main class="container">
    <div class="row">
        <section class="column">
            <h1>Fields</h1>
            <table class="records">
                <thead>
                <tr>
                    <th>Label</th>
                    <th>Value kind</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>A</td>
                    <td>single_line</td>
                    <td>
                        <a title="Edit" href="<?=$this->url("exercises.fields.edit",["e_id"=>$this->exerciceId,"fieldId"=>1])?>"><i class="fa fa-edit"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                           href="<?=$this->url("exercises.fields.delete",["e_id"=>$this->exerciceId,"fieldId"=>1])?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>

            <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button"
               rel="nofollow" data-method="put" href="<?=$this->url("exercises.update",["id"=>$this->exerciceId])?>?exercise%5Bstatus%5D=answering"><i
                        class="fa fa-comment"></i> Complete and be ready for answers</a>

        </section>
        <section class="column">
            <h1>New Field</h1>
            <form action="<?=$this->url("exercises.fields.create",["e_id"=>$this->exerciceId])?>" accept-charset="UTF-8" method="post">

                <div class="field">
                    <label for="field_label">Label</label>
                    <input type="text" name="field[label]" id="field_label">
                </div>

                <div class="field">
                    <label for="field_value_kind">Value kind</label>
                    <select name="field[value_kind]" id="field_value_kind">
                        <option selected="selected" value="single_line">Single line text</option>
                        <option value="single_line_list">List of single lines</option>
                        <option value="multi_line">Multi-line text</option>
                    </select>
                </div>

                <div class="actions">
                    <input type="submit" name="commit" value="Create Field" data-disable-with="Create Field">
                </div>
            </form>
        </section>
    </div>
</main>