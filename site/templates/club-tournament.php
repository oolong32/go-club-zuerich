<?php snippet('header') ?>

<main>
  <h2><?= $page->title() ?></h2>

  <section id="tournament-info">
    <?= $page->text()->kirbytext() ?>

  </section>

<?php
  // if the form input is not valid, show a list of alerts
  // ev. nicht nötig, weil required stuff schon im markup
  if ($alert): ?>
  <aside class="alert">
    <ul>
      <?php foreach ($alert as $message): ?>
      <li><?= kirbytext($message) ?></li>
      <?php endforeach ?>
    </ul>
  </aside>
  <?php endif ?>

  <!-- Tournament Table -->
  <?php snippet('club-tournament-table'); ?>

  <!-- Registration -->
  <?php snippet('club-tournament-registration', compact('data')); ?>

  <!-- Registered Players -->
  <?php snippet('club-tournament-players', ['players' => $page->childrenAndDrafts()]); ?>

  <?php snippet('template-debug', ['template' => 'club-tournament']) ?>
</main>

<?php snippet('footer') ?>
