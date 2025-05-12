<?php snippet('header') ?>

<main>
  <h2><?= $page->title() ?></h2>

  <section id="tournament-info">
  <h3>General Information</h3>
    <?= $page->text() ?>

    <p><strong>Date:</strong> <?= $page->date() ?></p>
  </section>

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

  <!-- Registration -->
  <?php snippet('tournament-registration', compact('data')); ?>

  <!-- Registered Players -->
  <?php snippet('tournament-players', ['players' => $page->childrenAndDrafts()]); ?>

  <aside class="template-marker">Template: Turnier</aside>
</main>

<?php snippet('footer') ?>
