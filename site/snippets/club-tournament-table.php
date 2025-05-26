<h3 id="results"><?= t('pairingResults') ?></h3>
<?php if (count($players) < 2) : ?>
  <p><?= t('notEnoughPlayers') ?></p>
<?php else : ?>
    <?php if ( isset($resultSuccess['message']) ) : ?>
      <p style="background: palegreen"><?= $resultSuccess['message'] ?></p>
    <?php endif ?>

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
          <!-- display game state/result -->
           <?php $played = false ?> <?# muss aus page kommen #?>
           <td class="result-cell <?= $played ? 'game-played' : 'result-pending' ?>"
            data-player-a="<?= $row->name() ?>"
            data-player-b="<?= $col->name()?>" >
            <?php snippet('club-tournament-table-result', array(
              'playerA' => $row->name(),
              'playerB' => $col->name(),
              'played' => false,
              'win' => false,
              'jigo' => false,
            )) ?>
          <!-- submit result form -->
          <?php snippet('club-tournament-submit-result-form', array(
            'playerA' => $row->name(),
            'playerB' => $col->name(),
            'playerAID' => $row->uuid(),
            'playerBID' => $col->uuid(),
            )) ?>
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