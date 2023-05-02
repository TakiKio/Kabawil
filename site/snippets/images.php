<div class="images grid gtc-columns-small">

    <?php foreach ($images as $image) : ?>
        <img src="<?= $image->resize('400')->url() ?>" width="100%" height="auto" >
   <?php endforeach ?>
</div>