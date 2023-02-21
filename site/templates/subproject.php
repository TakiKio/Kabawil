<?php snippet('layout/master', slots: true) ?>
    <?= slot('head') ?>
    <?= endslot() ?>
    
    <?php slot('sidebar') ?>
        <?php snippet('sidebar', ['documentations' => $page->parent()->parent()->parent()]) ?>
    <?php endslot() ?>
    
    <?= slot('main') ?>
        <section class="main kirbytext">
            <div class="content subProject" style="padding-top: 3rem">
                <article>
                    <strong><?= $page->title() ?></strong>
                    <h4><?= $page->author() ?></h4>
                    <aside><?= $page->aside()->kt() ?></aside>
                    <?= $page->text()->kt() ?>
                    <?php if ($page->footnotes()->isNotEmpty()) : ?>
                        <hr>
                        <div class="footnotes"><?= $page->footnotes()->kt() ?></div>
                    <?php endif ?>
                </article>
            </div>
        </section>
    <?php endslot() ?>
<?php endsnippet() ?>
