<h3 id="registration"><?= t('registration') ?></h3>

  <?php if ( strlen($registrationSuccess) ) : ?>
    <p class="success"><?= $registrationSuccess ?></p>
  <?php endif ?>

<form action="<?= $page->url() ?>" method="POST">

<section class="form-element">
  <label for="name">Name <abbr title="required">*</abbr></label>
  <input type="text" name="name" id="name" value="<?= $data['name'] ?? null ?>" required>
</section>

<section class="form-element">
  <label for="rank"><?= t('strength') ?> <abbr title="required">*</abbr></label>
  <select id="rank" name="rank" value="<?= $data['rank'] ?? null ?>" required>
    <option value="8-Dan">8 Dan</option>
    <option value="7-Dan">7 Dan</option>
    <option value="6-Dan">6 Dan</option>
    <option value="5-Dan">5 Dan</option>
    <option value="4-Dan">4 Dan</option>
    <option value="3-Dan">3 Dan</option>
    <option value="2-Dan">2 Dan</option>
    <option value="1-Dan">1 Dan</option>
    <option value="" selected=""><?= t('pleaseChoose') ?></option>
    <option value="1-Kyu">1 Kyu</option>
    <option value="2-Kyu">2 Kyu</option>
    <option value="3-Kyu">3 Kyu</option>
    <option value="4-Kyu">4 Kyu</option>
    <option value="5-Kyu">5 Kyu</option>
    <option value="6-Kyu">6 Kyu</option>
    <option value="7-Kyu">7 Kyu</option>
    <option value="8-Kyu">8 Kyu</option>
    <option value="9-Kyu">9 Kyu</option>
    <option value="10-Kyu">10 Kyu</option>
    <option value="11-Kyu">11 Kyu</option>
    <option value="12-Kyu">12 Kyu</option>
    <option value="13-Kyu">13 Kyu</option>
    <option value="14-Kyu">14 Kyu</option>
    <option value="15-Kyu">15 Kyu</option>
    <option value="16-Kyu">16 Kyu</option>
    <option value="17-Kyu">17 Kyu</option>
    <option value="18-Kyu">18 Kyu</option>
    <option value="19-Kyu">19 Kyu</option>
    <option value="20-Kyu">20 Kyu</option>
    <option value="21-Kyu">21 Kyu</option>
    <option value="22-Kyu">22 Kyu</option>
    <option value="23-Kyu">23 Kyu</option>
    <option value="24-Kyu">24 Kyu</option>
    <option value="25-Kyu">25 Kyu</option>
    <option value="26-Kyu">26 Kyu</option>
    <option value="27-Kyu">27 Kyu</option>
    <option value="28-Kyu">28 Kyu</option>
    <option value="29-Kyu">29 Kyu</option>
    <option value="30-Kyu">30 Kyu</option>
  </select>
</section>

<div class="honey">
     <label for="website">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" value="<?= isset($data['website']) ? esc($data['website']) : null ?>"/>
  </div>

<section class="form-element">
  <input class="registration-button" type="submit" name="club-tournament-register" value="<?= t('register') ?>">
</section>

</form>