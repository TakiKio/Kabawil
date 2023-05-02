<?php snippet('layout/master', slots: true) ?>
    <?= slot('head') ?>
        <strong><?= $page->title()->upper() ?></strong>
        <p></p>
    <?= endslot() ?>
    
    <?php slot('sidebar') ?>
        <?php snippet('sidebar', ['documentations' => $page]) ?>
    <?php endslot() ?>
    <?= slot('main') ?>
        <section class="print main kirbytext">
        <?php foreach($page->children()->listed() as $chapter) :?>
            <div class="kapitel">
                Kapitel: <?= $chapter->title() ?>
            </div>
            <?php if ($chapter->hasListedChildren()) : ?>
                <div class="content">
                <?php foreach ($chapter->children()->listed() as $project) : ?>
                    <div class="chapter">
                        <article>
                            <small>Inhaltsverzeichnis: <?= $project->title() ?></small><br>
                            <h1><?= $project->headline()->or($project->title()) ?></h1>
                            <h4><?= $project->subheadline() ?></h4>
                            <h4><?= $project->author() ?></h4>
                            <?php snippet('images', ['images' => $project->images()]) ?>
                            <aside><?= $project->aside()->kt() ?></aside>
                            <?= $project->text()->kt() ?>
                            <?php if ($project->footnotes()->isNotEmpty()) : ?>
                                <hr>
                                <div class="footnotes"><?= $project->footnotes()->kt() ?></div>
                            <?php endif ?>
                        </article>
                        <?php if ($project->hasListedChildren()) :
                            foreach ($project->children()->listed() as $subProject) : ?>
                                <article>
                                    <h2><?= $subProject->title() ?></h2>
                                    <h4><?= $subProject->author() ?></h4>
                                    <?php snippet('images', ['images' => $subProject->images()]) ?>
                                    <aside><?= $subProject->aside()->kt() ?></aside>
                                    <?= $subProject->text()->kt() ?>
                                    <?php if ($subProject->footnotes()->isNotEmpty()) : ?>
                                        <hr>
                                        <div class="footnotes"><?= $subProject->footnotes()->kt() ?></div>
                                    <?php endif ?>
                                </article>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        </section>
    <?php endslot() ?>
<?php endsnippet() ?>
