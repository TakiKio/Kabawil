<?php snippet('layout/master', slots: true) ?>
    
    <?php slot('sidebar') ?>
        <?php snippet('sidebar', ['documentations' => $page->parent()]) ?>
    <?php endslot() ?>
    
    <?= slot('main') ?>
        <section class="main kirbytext">
            <div class="kapitel">
                Kapitel:<?= $page->title() ?>
            </div>
            
            <div class="content project">
                <aside><?= $page->aside()->kt() ?></aside>
                <?php if ($page->hasListedChildren()) : ?>
                    <?php foreach($page->children() as $projects) :?> 
                        <article>
                            <h2><?= $projects->headline()->or($projects->title()) ?></h2>
                            <h3><?= $projects->subheadline() ?></h3>
                            
                            <h4><?= $projects->author() ?></h4>
                            <aside><?= $projects->aside()->kt() ?></aside>
                            <?= $projects->text()->kt() ?>
                            <?php if ($projects->footnotes()->isNotEmpty()) : ?>
                                <hr>
                                <div class="footnotes"><?= $projects->footnotes()->kt() ?></div>
                            <?php endif ?>
                        </article>
                        <?php if ($projects->hasListedChildren()) :
                            foreach ($projects->children()->listed() as $project) : ?>
                                <article>
                                    <h2><?= $project->title() ?></h2>
                                    <h4><?= $project->author() ?></h4>
                                    <aside><?= $project->aside()->kt() ?></aside>
                                    <?= $project->text()->kt() ?>
                                    <?php if ($project->footnotes()->isNotEmpty()) : ?>
                                        <hr>
                                        <div class="footnotes"><?= $project->footnotes()->kt() ?></div>
                                    <?php endif ?>
                                </article>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php if ($projects->hasListedChildren()) :
                            foreach ($projects->children()->listed() as $subProject) : ?>
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
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </section>
    <?php endslot() ?>
<?php endsnippet() ?>
