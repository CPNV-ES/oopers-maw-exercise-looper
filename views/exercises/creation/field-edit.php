<?php

include $_SERVER['DOCUMENT_ROOT'] . "/../views/headers/heading-managing.php" ?>

<main class="container">
    <h1>Editing Field</h1>

    <form action="/exercises/100/fields/222" accept-charset="UTF-8" method="post">
        <div class="field">
            <label for="field_label">Label</label>
            <input type="text" value="QUOI" name="field[label]" id="field_label">
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
            <input type="submit" name="commit" value="Update Field" data-disable-with="Update Field">
        </div>
    </form>
</main>