<?php snippet('layout/master', slots: true) ?>
    
    <?php slot('sidebar') ?>
        <?php snippet('sidebar', ['documentations' => $page->parent()]) ?>
    <?php endslot() ?>
    
    <?= slot('main') ?>
        <section class="main print kirbytext">
            <div class="kapitel">
                Kapitel:<?= $page->title() ?>
            </div>
            
            <div class="content project">
                <aside><?= $page->aside()->kt() ?></aside>
                <?php if ($page->hasListedChildren()) : ?>
                    <?php foreach($page->children() as $project) : ?>
                        <article>
                            <small>Inhaltsverzeichnis: <?= $project->title() ?></small><br>
                            <h2><?= $project->headline()->or($project->title()) ?></h2>
                            <h3><?= $project->subheadline() ?></h3>
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
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </section>
    <?php endslot() ?>
<?php endsnippet() ?>
