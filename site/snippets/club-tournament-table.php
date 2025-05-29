<h3 id="results"><?= t('pairingResults') ?></h3>
<?php if (count($players) < 2) : ?>
  <p><?= t('notEnoughPlayers') ?></p>
<?php else : ?>

    <?php if (count($players) > 1) : ?>
    <table id="pairing-table" style="text-align: center;">
    <thead>
      <tr>
        <td class="invisible"></td>
        <?php foreach ($players as $col) : ?>
          <th scope="col" class="column-head"><?= $col->name() ?></th>
        <?php endforeach?>
      </tr>
    </thead>
    <?php foreach ($players as $row) : ?>
    <tr>
      <th scope="row" class="row-head"><?= $row->name() ?></th>
      <?php foreach ($players as $col) : ?>
        <?php if ($row->id() == $col->id()) :?>
          <td class="empty"></td>
        <?php else: ?>
          <?php
            $playerA = trim($row->name());
            $playerB = trim($col->name());
            $playerAID = $row->uuid();
            $playerBID = $col->uuid();
            $aGames = $games->filterBy('tags',  $playerA, ',');
            $game = $aGames->filterBy('tags', $playerB, ',');
            $gameId = $game->first()->uuid();
            // get game info
            $gameData = $games->find($gameId);
            $played = $gameData->played()->toBool();
            $result = trim($gameData->result());
          ?>

          <!-- display game state/result -->
           <td class="result-cell <?= $played ? 'game-played' : 'result-pending' ?>">
            <?php if ($played) : ?>
              <?php snippet('club-tournament-table-result', array(
                'playerA' => $playerA,
                'playerB' => $playerB,
                'played' => $played,
                'result' => $result,
              )) ?>

            <?php else: ?>
              <button class="result-form-toggle">⌛️</button>
              <?php snippet('club-tournament-submit-result-form', array(
                'playerA' => $playerA,
                'playerB' => $playerB,
                'playerAID' => $playerAID,
                'playerBID' => $playerBID,
                'gameId'    => $gameId
                )) ?>
            <?php endif ?>
          </td>
        <?php endif ?>
      <?php endforeach?>
    </tr>
    <?php endforeach?>
    <?php endif ?>
  </table>
  <hr>
  <aside id="pairing-table-legend" aria-labelledby="legende-title">
    <h4 id="legende-title"><?= t('legend') ?></h4>
    <ul style="list-style: none; padding: 0;">
    <li><span class="emoji">⌛️</span>️ <?= t('toPlay') ?></li>
    <li><span class="emoji">⚪</span>️ <?= t('won') ?></li>
    <li><span class="emoji">⚫</span>️ <?= t('lost') ?></li>
    <li><span class="emoji">💜</span>️ <?= t('jigo') ?></li>
  </ul>
</aside>
<?php endif ?>