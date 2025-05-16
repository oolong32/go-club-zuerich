<h3><?php echo t('registration') ?></h3>

<form action="<?= $page->url() ?>" method="POST">

<section class="form-element">
  <label for="name">Name <abbr title="required">*</abbr></label>
  <input type="text" name="name" id="name" value="<?= $data['name'] ?? null ?>" required>
</section>

<section class="form-element">
  <label for="email">E-Mail <abbr title="required">*</abbr></label>
  <input type="email" name="email" id="email" value="<?= $data['email'] ?? null ?>" required>
</section>

<section class="form-element">
  <label for="rank"><?php echo t('strength') ?></label>
  <select id="rank" name="rank" value="<?= $data['rank'] ?? null ?>">
    <option>8 Dan</option>
    <option>7 Dan</option>
    <option>6 Dan</option>
    <option>5 Dan</option>
    <option>4 Dan</option>
    <option>3 Dan</option>
    <option>2 Dan</option>
    <option>1 Dan</option>
    <option selected=""><?php echo t('pleaseChoose') ?></option>
    <option>1 Kyu</option>
    <option>2 Kyu</option>
    <option>3 Kyu</option>
    <option>4 Kyu</option>
    <option>5 Kyu</option>
    <option>6 Kyu</option>
    <option>7 Kyu</option>
    <option>8 Kyu</option>
    <option>9 Kyu</option>
    <option>10 Kyu</option>
    <option>11 Kyu</option>
    <option>12 Kyu</option>
    <option>13 Kyu</option>
    <option>14 Kyu</option>
    <option>15 Kyu</option>
    <option>16 Kyu</option>
    <option>17 Kyu</option>
    <option>18 Kyu</option>
    <option>19 Kyu</option>
    <option>20 Kyu</option>
    <option>21 Kyu</option>
    <option>22 Kyu</option>
    <option>23 Kyu</option>
    <option>24 Kyu</option>
    <option>25 Kyu</option>
    <option>26 Kyu</option>
    <option>27 Kyu</option>
    <option>28 Kyu</option>
    <option>29 Kyu</option>
    <option>30 Kyu</option>
  </select>
</section>

<section class="form-element">
  <label for="age"><?php echo t('age') ?></label>
  <!-- value nicht sauber, wenn es neu reinkommt -->
  <select id="age" name="age" value="<?= $data['age'] ?? null ?>">
    <option selected="" value="0"><?php echo t('pleaseChoose') ?></option>
    <option value="adult"><?php echo t('adult') ?></option>
    <option value="student"><?php echo t('student') ?></option>
    <option value="minor"><?php echo t('minor') ?></option>
  </select>
</section>

<section class="form-element">
  <label for="club"><?php echo t('cityClub') ?></label>
  <input id="club" name="club" value="<?= $data['club'] ?? null ?>">
</section>

<h3>Workshop</h3>
<section class="form-element">
  <fieldset>
    <legend><?php echo t('workshopParticipate') ?>.</legend>

    <div class="radio-buttons" style="margin-top: 0.5rem;">
      <span>
        <input type="radio" id="yes" name="workshop" value="yes" <?= (isset($data['workshop']) && $data['workshop'] == "yes") ? "checked" : null ?> />
        <label for="yes"><?php echo t('yes') ?></label>
      </span>

      <span>
        <input type="radio" id="no" name="workshop" value="no" <?= (isset($data['workshop']) && $data['workshop'] == "no") ? "checked" : null ?> />
        <label for="no"><?php echo t('no') ?></label>
      </span>

      <span>
        <input type="radio" id="maybe" name="workshop" value="maybe" <?= (isset($data['workshop']) && $data['workshop'] == "maybe") ? "checked" : null ?> />
        <label for="maybe"><?php echo t('maybe') ?></label>
      </span>
    </div>

  </fieldset>
</section>

<section class="form-element">
  <label for="remarks"><?php echo t('remarks') ?></label>
  <textarea rows="5" cols="43" id="remarks" name="remarks"><?= $data['remarks'] ?? null ?></textarea>

</section>

<div class="honey">
     <label for="website">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" value="<?= isset($data['website']) ? esc($data['website']) : null ?>"/>
  </div>


<section class="form-element">
  <input class="registration-button" type="submit" name="register" value="<?php echo t('register') ?>">
</section>

  <p>Changes, cancelations or questions: <a href="mailto:zuerigo@gmail.com"></a></p>

</form>

<h4><?php echo t('Notice') ?></h4>
<p><?php echo t('egdNotice') ?></p>
