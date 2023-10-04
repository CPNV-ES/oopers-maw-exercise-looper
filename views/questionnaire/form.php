<form action="<?= $form->getAction() ?>" method="<?= $form->getMethod() ?>">
    <?= form_field($form->getField('title')) ?>
    <button type="submit">Soumettre</button>
</form>