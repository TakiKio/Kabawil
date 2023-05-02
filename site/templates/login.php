<?php snippet('layout/default', slots: true) ?>
    <?= slot('head') ?>
        
        <?php if($error): ?>
        <div class="alert"><?= $page->alert()->html() ?></div>
        <?php endif ?>
        
    <?= endslot() ?>
    
    <?php slot('main') ?>
        <?php snippet('header') ?>
        <div class="container flex">
            <form class="m-auto" method="post" action="<?= $page->url() ?>">
              <div>
                <label for="email"><?= $page->username()->html() ?></label>
                <input type="email" id="email" name="email" value="<?= get('email') ? esc(get('email'), 'attr') : '' ?>">
              </div>
              <div>
                <label for="password"><?= $page->password()->html() ?></label>
                <input type="password" id="password" name="password" value="<?= get('password') ? esc(get('password'), 'attr') : '' ?>">
              </div>
              <div>
                <input class="button" type="submit" name="login" value="Login">
              </div>
            </form>
        </div>
        
        <?php snippet('footer') ?>
    <?php endslot() ?>
<?php endsnippet() ?>
