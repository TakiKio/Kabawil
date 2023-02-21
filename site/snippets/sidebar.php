<?php if ($documentations) : ?>
    <ul class="toc">
    <?php foreach ($documentations->children()->listed() as $chapter) :?>
        <li <?php e($chapter->isActive(), ' aria-current="location"') ?>  style="font-size: 1.2rem; color: var(--secondary-color); margin-top: 1rem;">
          <strong><a href="<?= $chapter->url() ?>"><?= $chapter->title() ?></a></strong>
        </li>
        <?php if ($chapter->hasListedChildren()) : ?>
            <ul class="toc" style="padding-left: .5rem">
            <?php foreach ($chapter->children()->listed() as $project) : ?>
                <li<?php e($project->isActive(), ' aria-current="location"') ?>> 
                    <a href="<?= $project->url() ?>"><?= $project->title()->upper() ?></a>
                </li>
                    <?php if ($project->hasListedChildren()) : ?>
                        <ul class="toc sub" style="padding-left: 1rem">
                            <?php foreach ($project->children()->listed() as $subProject) :?>
                                <li<?php e($subProject->isActive(), ' aria-current="location"') ?>><a href="<?= $subProject->url() ?>"><?= $subProject->title() ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
            <?php endforeach ?>
            </ul>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>