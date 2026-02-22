<?php if ($players): ?>

<h3 id="registered-players"><?php echo t('Registerd Players') ?></h3>
<table id="players-table">
  <thead>
  <tr>
    <th style="text-align: left;">Name</th>
    <th style="text-align: left;"><?php echo t('strength') ?></th>
    <th style="text-align: left;">Club</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($players as $player): ?>
  <tr>
    <td class="name" style="text-align: left;"><?= $player->name() ?></td>
    <td class="rank" style="text-align: left;"><?= $player->rank() ?></td>
    <td class="cub" style="text-align: left;"><?= $player->club() ?></td>
  </tr>
  <?php endforeach ?>
</tbody>
</table>

<?php else: ?>
<!-- no registrations users yet -->


<?php endif ?>