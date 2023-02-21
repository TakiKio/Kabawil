<?php snippet('layout/master', slots: true) ?>
    <?= slot('head') ?>
        <h1><?= $page->subtitle() ?></h1>
    <?= endslot() ?>
    <?= slot('main') ?>
       
    <?php endslot() ?>
<?php endsnippet() ?>
