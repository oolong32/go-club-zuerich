<h3><?php echo t('registration') ?></h3>

<form action="<?= $page->url() ?>" method="POST">

<div class="honey">
     <label for="website">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" value="<?= isset($data['website']) ? esc($data['website']) : null ?>"/>
  </div>

<section class="form-element">
  <input class="registration-button" type="submit" name="register" value="<?php echo t('register') ?>">
</section>

</form>