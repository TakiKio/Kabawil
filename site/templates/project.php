<?php snippet('layout/master', slots: true) ?>
    <?= slot('head') ?>
    <?= endslot() ?>
    
    <?php slot('sidebar') ?>
        <?php snippet('sidebar', ['documentations' => $page->parent()->parent()]) ?>
    <?php endslot() ?>
    
    <?= slot('main') ?>
    
        <section class="main kirbytext">
            <div class="content project">
                <article>
                    <h1><?= $page->headline()->or($page->title()) ?></h1>
                    <h3><?= $page->subheadline() ?></h3>
                    <h4><?= $page->author() ?></h4>
                    <aside><?= $page->aside()->kt() ?></aside>
                    <?= $page->text()->kt() ?>
                    <?php if ($page->footnotes()->isNotEmpty()) : ?>
                        <hr>
                        <div class="footnotes"><?= $page->footnotes()->kt() ?></div>
                    <?php endif ?>
                </article>
                <?php if ($page->hasListedChildren()) :
                    foreach ($page->children()->listed() as $subProject) : ?>
                        <article>
                            <h2><?= $subProject->title() ?></h2>
                            <h4><?= $subProject->author() ?></h4>
                            <aside><?= $subProject->aside()->kt() ?></aside>
                            <?= $subProject->text()->kt() ?>
                            <?php if ($subProject->footnotes()->isNotEmpty()) : ?>
                                <hr>
                                <div class="footnotes"><?= $subProject->footnotes()->kt() ?></div>
                            <?php endif ?>
                        </article>
                    <?php endforeach ?>
                <?php endif ?><br>
                <?php foreach ($page->grant()->split() as $grant): ?>
                    <small><?= page($grant)->title() ?></small><br>
                  <?php endforeach ?>
            </div>
        </section>
    <?php endslot() ?>
<?php endsnippet() ?>
