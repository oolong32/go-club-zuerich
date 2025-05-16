<?php if ($players): ?>

<h3 id="registered-players"><?php echo t('Registerd Players') ?></h3>
<table id="players-table">
  <thead>
  <tr>
    <th>Name</th>
    <th><?php echo t('strength') ?></th>
  </tr>
</thead>
<tbody>
  <?php foreach ($players as $player): ?>
    <?php if ($player->visibility() == 'visible'): ?>
    <tr>
      <td class="name"><?= $player->name() ?></td>
      <td class="rank"><?= $player->rank() ?></td>
    </tr>
    <?php endif ?>
  <?php endforeach ?>
</tbody>
</table>

<?php else: ?>
<!-- no registrations users yet -->


<?php endif ?>