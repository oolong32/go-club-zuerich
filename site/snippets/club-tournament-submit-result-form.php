  <?php
    $aGames = $games->filterBy('tags',  $playerA, ',');
    $game = $aGames->filterBy('tags', $playerB, ',');
    $gameId = $game->first()->uuid();
  ?>

  <form class="submit-result hidden" action="<?= $page->url() ?>" method="POST">
    <p><?= $playerA ?>–<?= $playerB ?></p>
    <h4><?= t('result') ?></h4>
    <button class="cancel-button"><?= t('cancel') ?></button>

    <div class="honey">
      <label for="website">If you are a human, leave this field empty</label>
      <input type="website" name="website" id="website" value="<?= isset($data['website']) ? esc($data['website']) : null ?>"/>
    </div>

    <section class="form-element">
      <fieldset>
        <legend><?= t('whoWon') ?></legend>

        <div class="radio-button-container">
          <input type="radio" id="player-A" name="result" value="<?= $playerA ?>" />
          <label class="radio-button-label" for="player-A"><?= $playerA ?></label>
        </div>

        <div class="radio-button-container">
          <input type="radio" id="player-B" name="result" value="<?= $playerB ?>" />
          <label class="radio-button-label" for="player-B"><?= $playerB ?></label>
        </div>

        <div class="radio-button-container">
          <input type="radio" id="jigo" name="result" value="jigo" checked />
          <label class="radio-button-label" for="jigo"><?= t('jigo') ?></label>
        </div>
      </fieldset>

      <!-- Values needed to display & query Player Information  -->
      <input type="hidden" name="game-id" value="<?= $gameId ?>">
      <input type="hidden" name="player-a" value="<?= $playerA ?>">
      <input type="hidden" name="player-b" value="<?= $playerB ?>">
      <input type="hidden" name="player-a-id" value="<?= $playerAID ?>">
      <input type="hidden" name="player-b-id" value="<?= $playerBID ?>">
    </section>

    <section class="form-element">
      <input class="submit-result-button" type="submit" name="submit-result" value="<?= t('submit') ?>">
    </section>

  </form>