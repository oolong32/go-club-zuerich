<?php if ($players): ?>

<h2 id="registered-players">Registerd Players</h2>
<table>
  <thead>
  <tr>
    <th>Name</th>
    <th>Rank</th>
    <th>Club</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($players as $player): ?>
    <?php if ($player->visibility() == 'visible'): ?>
    <tr>
      <td class="name"><?= $player->name() ?></td>
      <td class="rank"><?= $player->rank() ?></td>
      <td class="cub"><?= $player->club() ?></td>
    </tr>
    <?php endif ?>
  <?php endforeach ?>
</tbody>
</table>

<?php else: ?>
<!-- no registrations users yet -->


<?php endif ?>