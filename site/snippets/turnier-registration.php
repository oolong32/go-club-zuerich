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
  <label for="rank">Strength</label>
  <select id="rank" name="rank" value="<?= $data['strength'] ?? null ?>">
    <option>8 Dan</option>
    <option>7 Dan</option>
    <option>6 Dan</option>
    <option>5 Dan</option>
    <option>4 Dan</option>
    <option>3 Dan</option>
    <option>2 Dan</option>
    <option>1 Dan</option>
    <option selected="">please choose</option>
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
  <label for="age">Age</label>
  <!-- value nicht sauber, wenn es neu reinkommt -->
  <select id="age" name="age" value="<?= $data['age'] ?? null ?>">
    <option selected="" value="0">-</option>
    <option value="adult">Older than 18</option>
    <option value="student">Student and 25 or younger</option>
    <option value="minor">18 or younger</option>
  </select>
</section>

<section class="form-element">
  <label for="club">City/Club</label>
  <input id="club" name="club" value="<?= $data['club'] ?? null ?>">
</section>

<section class="form-element">
  <fieldset>
    <legend>I’d like to participate at the workshop with Cho Seok-bin on friday evening at the <a href="https://maps.app.goo.gl/yfGQ4CsZ7BLvrhmm8" target="_blank">Würfel</a>.</legend>

    <div>
      <input type="radio" id="yes" name="workshop" value="yes" <?= (isset($data['workshop']) && $data['workshop'] == "yes") ? "checked" : null ?> />
      <label for="yes">yes</label>
    </div>

    <div>
      <input type="radio" id="no" name="workshop" value="no" <?= (isset($data['workshop']) && $data['workshop'] == "no") ? "checked" : null ?> />
      <label for="no">no</label>
    </div>

    <div>
      <input type="radio" id="maybe" name="workshop" value="maybe" <?= (isset($data['workshop']) && $data['workshop'] == "maybe") ? "checked" : null ?> />
      <label for="maybe">maybe</label>
    </div>

    <p>More info about Seok-bin on his <a href="https://x.com/bin7674" target="_blank">x account</a> and his <a href="http://www.nakamurahoninbou.com/" target="_blank">web page</a>.</p>
  </fieldset>
</section>

<section class="form-element">
  <label for="remarks">Remarks</label>
  <textarea rows="5" cols="43" id="remarks" name="remarks"><?= $data['remarks'] ?? null ?></textarea>

</section>

<section class="form-element">
  <label>Incognito?</label>
  <input type="checkbox" name="visibility" value="incognito" <?= (isset($data['visibility']) && $data['visibility'] == "incognito") ? "checked" : null ?>  >Please don’t add my name to the <a href="#Registered_Players">registreted players list</a>.
</section>

<div class="honey">
     <label for="website">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" value="<?= isset($data['website']) ? esc($data['website']) : null ?>"/>
  </div>

  <h3>Notice</h3>
  <p>Your Name, Club, Rank and your Results in this tournament will be published on the <a href="http://europeangodatabase.eu/" target="_blank"> Go Database (EGD)</a>.</p>

  <input class="registration-button" type="submit" name="register" value="register">

  <p>Changes, cancelations or questions: (hier scrambled mail (brauchts das noch?), bzw. turnier-kontakt)</p>
  
</form>
