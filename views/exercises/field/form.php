<?= $this->start(); ?>
<?= $this->fields(); ?>
    <div class="actions">
        <input type="submit" name="commit" value="<?= $this->button ?? 'Create Field' ?>" data-disable-with="<?= $this->button ?? 'Create Field' ?>">
    </div>
<?= $this->end(); ?>