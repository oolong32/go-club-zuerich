
<h3><?php echo t('results') ?></h3>

    <?php $players = array('Lorenz', 'Josef', 'Dan', 'Daniel', 'Eric'); ?>

    <?php if (sizeof($players) > 1) : ?>
    <table id="club-tournament-table" style="text-align: center;">
    <?php $num_players = sizeof($players) ?>

    <thead>
      <tr>
        <td class="invisible"></td>
    <?php foreach($players as $colHead) : ?>
      <th scope="col" class="column-head"><?= $colHead ?></th>
    <?php endforeach?>
      </tr>
    </thead>

    <?php foreach($players as $rowHead) : ?>
    <tr>
      <th scope="row" class="row-head"><?= $rowHead ?></th>
      <?php foreach($players as $cell) : ?>
        <?php if ($rowHead == $cell) :?>
        <td class="empty"></td>
        <?php else: ?>
        <td><span class="result">⌛️<span><br><span class="pairing"><?= $rowHead . '–'. $cell ?></span></td>
        <?php endif ?>
      <?php endforeach?>
    </tr>
    <?php endforeach?>
    <?php endif ?>

  </table>

  <aside aria-labelledby="legende-title">
    <h3 id="legende-title"><?php echo t('legend') ?></h3>
    <ul style="list-style: none; padding: 0;">
    <li><span class="emoji">⌛️</span>️ <?php echo t('toPlay') ?></li>
    <li><span class="emoji">⚫</span>️ <?php echo t('lost') ?></li>
    <li><span class="emoji">⚪</span>️ <?php echo t('won') ?></li>
  </ul>
</aside>