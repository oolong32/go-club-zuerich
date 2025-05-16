<h3><?php echo t('registration') ?></h3>

<form action="<?= $page->url() ?>" method="POST">

<section class="form-element">
  <label for="name">Name <abbr title="required">*</abbr></label>
  <input type="text" name="name" id="name" value="<?= $data['name'] ?? null ?>" required>
</section>

<section class="form-element">
  <label for="white"><?php echo t('white') ?></label>
  <select id="white" name="white" value="<?= $data['white'] ?? null ?>">
    <option>get player names from registered list</option>
    <option selected=""><?php echo t('white') ?></option>
  </select>
</section>

<section class="form-element">
  <label for="black"><?php echo t('black') ?></label>
  <select id="black" name="black" value="<?= $data['black'] ?? null ?>">
    <option>get player names from registered list</option>
    <option selected=""><?php echo t('black') ?></option>
  </select>
</section>

<div class="honey">
     <label for="website">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" value="<?= isset($data['website']) ? esc($data['website']) : null ?>"/>
  </div>

<section class="form-element">
  <input class="registration-button" type="submit" name="register" value="<?php echo t('register') ?>">
</section>

</form>