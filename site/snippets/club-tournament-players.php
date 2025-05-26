
<h3 id="registered-players"><?= t('participants') ?></h3>
<?php if (count($players) < 1): ?>
  <p><?= t('noParticipantsYet') ?></p>
<?php else : ?>
  <table id="players-table">
    <thead>
    <tr>
      <th class="name">Name</th>
      <th class="rank"><?= t('strength') ?></th>
      <th class="wins"><?= t('points') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($players as $player): ?>
      <tr>
        <td class="name"><?= $player->name() ?></td>
        <?php $rank = str_replace('-', ' ', $player->rank()); ?>
        <td class="rank"><?= $rank ?></td>
        <td class="wins"><?= $player->wins() ?></td>

        <!-- nice to have: number of wins -->
      </tr>
    <?php endforeach ?>
  </tbody>
  </table>
<?php endif ?>