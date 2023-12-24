<header class="dashboard">
    <section class="container">
        <p><img src="/assets/logo.png" alt="Exercise looper logo"></p>
        <h1>Exercise<br>Looper</h1>
    </section>
</header>

<div class="container dashboard">
    <section class="row">
        <div class="column">
            <a class="button answering column" href="<?= $this->url("exercises.answering") ?>">Take an exercise</a>
        </div>
        <div class="column">
            <a class="button managing column" href="<?= $this->url("exercises.new") ?>">Create an exercise</a>
        </div>
        <div class="column">
            <a class="button results column" href="<?= $this->url("exercises.index") ?>">Manage an exercise</a>
        </div>
    </section>
</div>