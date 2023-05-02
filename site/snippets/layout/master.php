<!DOCTYPE html>
<html lang="de" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $site->title() ?> | <?= $page->headline()->or($page->title()) ?></title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <!-- !CSS -->
    <?= css('/assets/css/main.css') ?>
</head>
<!-- !Body -->
<body>
    <div id="container">
        <div class="grid">
            <div class="sidebar no-print" style="margin-right: 2rem">
                
                <?php if ($user = $kirby->user()) : ?>
                <ul class="login">
                    <li><a target="_blank" href="<?= $page->panel()->url() ?> ">Diese Seite bearbeiten</a>
                    </li>
                    <li><a href="<?= url('logout') ?>">Logout</a>
                    </li>
                </ul>
                <?php else : ?>
                    <?php go('/login') ?>
                <?php endif ?>
                <div style="">
                    <ul class="toc main">
                        <?php if ($documentations = collection('documentations')) : ?>
                            <?php if ($page->isHomePage()) :?>
                                <?php foreach ($documentations as $documentation) : ?>
                                    <li><a href="<?= $documentation->url() ?>"><?= $documentation->title() ?></a></li>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?php foreach ($documentations as $documentation) : ?>
                                    <li<?php e($documentation->isOpen(), ' aria-current="location"', ' class="display-none"') ?>><a href="<?= $documentation->url() ?>"><?= $documentation->title() ?></a></li>
                                <?php endforeach ?>
                            <?php endif ?>
                        <?php endif ?>
                    </ul>
                        <div class="sidebar-content">
                            <?php if ($sidebar = $slots->sidebar()) : ?>
                                <?= $sidebar ?>
                            <?php endif ?>
                        </div>
                </div>
            </div><!-- /header -->
        
            <section id="main"">
                <div class="only-print">
                    <?= date('d.m.Y') ?> / <?= $kirby->user()->username() ?>
                </div>
                <nav class="no-print" aria-label="breadcrumb">
                    Du bist hier:
                  <ul>
                    <?php foreach($site->breadcrumb()->not('home', 'dokumentationen') as $crumb): ?>
                     /<li class="inline-block no-underline" <?php e($crumb->isActive(), ' aria-current="location"') ?>><a href="<?= $crumb->url() ?>"><?= $crumb->title()->html() ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </nav>
                
                <?= $slots->head() ?>
                <?= $slots->main() ?>
            </section><!-- /main -->
        
        </div>
        <footer>
        
        </footer><!-- /footer -->
    </div><!--!/#container -->
</body>
</html>
