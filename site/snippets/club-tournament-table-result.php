<!-- table cell content-->

<?php if ($played && $win) : ?>
  <p>⚪️ <p>
<?php elseif ($played && !$win) : ?>
  <?php if ($jigo) : ?>
    <p>💜</p>
  <?php else: ?>
    <p>⚫</p>
  <?php endif ?>
<?php else: ?>
  <button class="foo bar result-form-toggle" data-foo="foo">⌛️</button>
<?php endif ?>
<!--
<p class="pairing"><span class="player-a"><?= $playerA ?></span>–<span class="player-b"><?= $playerB ?></p>
-->