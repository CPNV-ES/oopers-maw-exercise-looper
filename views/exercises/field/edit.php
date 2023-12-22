<?=$this->include("partial.topbar",["title"=>"Edit field of ".$this->exercise->getTitle(),"type"=>"managing"])?>

<main class="container">
    <h1>Editing Field</h1>
    <?= $this->form->render(['button' => 'Update field']) ?>
</main>