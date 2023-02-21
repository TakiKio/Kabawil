<?php snippet('layout/master', slots: true) ?>
    <?= slot('head') ?>
        <h1><?= $page->title() ?></h1>
    <?= endslot() ?>
<?php endsnippet() ?>
