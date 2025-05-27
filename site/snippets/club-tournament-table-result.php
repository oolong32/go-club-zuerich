<!-- display result -->
<?php if ($result === $playerA) : ?>
  <p>⚪️<p>
<?php elseif ($result === $playerB) : ?>
  <p>⚫</p>
<?php else: ?>
  <p>💜</p>
<?php endif ?>
<!--
<p class="pairing"><span class="player-a"><?= $playerA ?></span>–<span class="player-b"><?= $playerB ?></p>
-->