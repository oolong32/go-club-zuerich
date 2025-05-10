<?php snippet('header') ?>

<main>
<?php
  // if the form input is not valid, show a list of alerts
  if ($alert): ?>
  <aside class="alert">
    <ul>
      <?php foreach ($alert as $message): ?>
      <li><?= kirbytext($message) ?></li>
      <?php endforeach ?>
    </ul>
  </aside>
  <?php endif ?>

  <?php snippet('turnier-registration', compact('data')); ?>

  <aside class="template-marker">Template: Turnier</aside>
</main>

<?php snippet('footer') ?>
