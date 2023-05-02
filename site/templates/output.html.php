<?php
$document = collection('documentations')
    ->first();
$yearToPublish = $document->year();
$txtDocument = $document->title()->value() . '-' . $yearToPublish->toDate('Y');
dump($txtDocument);
//die;
$data = $document;
?>


<?php foreach($data->children()->listed() as $chapter) :?>
    <h1>Kapitel: <?= $chapter->title() ?></h1>
    <?php if ($chapter->aside()->isNotEmpty()) : ?>
        <i>Aside: <?= $chapter->aside()->kt() ?></i>
    <?php endif ?>
    <?php if ($chapter->hasListedChildren()) :
        foreach ($chapter->children()->listed() as $project) : ?>
            <h2>H1: <?= $project->headline()->or($project->title()) ?></h2>
            <?php if ($project->subheadline()->isNotEmpty()) : ?>
                <h2>Subhead: <?= $project->subheadline() ?></h2>
            <?php endif ?>
            <h4>Author: <?= $project->author() ?></h4>
            <?php if ($project->aside()->isNotEmpty()) : ?>
                <i>Aside: <?= $project->aside()->kt() ?></i>
            <?php endif ?>
            <?= $project->text()->kt() ?>
            <small><?= $project->footnotes()->kt() ?></small>
            <?php if ($project->hasListedChildren()) :
                foreach ($project->children()->listed() as $subProject) : ?>
                    <h2>H2: <?= $subProject->title() ?></h2>
                    <h4>Author: <?= $subProject->author() ?></h4>
                    <?php if ($subProject->aside()->isNotEmpty()) : ?>
                        <i>Aside: <?= $subProject->aside()->kt() ?></i>
                    <?php endif ?>
                    <?= $subProject->text()->kt() ?>
                <?php endforeach;
            endif;
        endforeach;
    endif;
endforeach ?>


