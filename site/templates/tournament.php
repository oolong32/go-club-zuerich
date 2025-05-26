<?php snippet('header') ?>

<main>
  <h2><?= $page->title() ?></h2>

  <section id="tournament-info">
  <!-- <h3>General Information</h3> -->
    <?= $page->text()->kirbytext() ?>

    <!-- <p><strong>Date:</strong> <?= $page->date() ?></p> -->
  </section>

  <section id="tournament-timetable">
    <h3>Timetable</h3>

    <div id="timetable">

      <?php
      // Registration needs to be displayed as duration (from–to)
      $registrationStart = $page->registration()->toDate('H:i'); // z. B. "14:30"
$time = DateTime::createFromFormat('H:i', $registrationStart); // DateTime-Objekt erzeugen
$time->add(new DateInterval('PT45M')); // 45 Minuten hinzufügen
$registrationEnd = $time->format('H:i'); // Neue Zeit wieder als String
?>

      <h4 class="timetable-heading day-1"><?= $page->day1()->toDate('l d.m.Y')?></h4>
      <p class="day-1 row-2"><span class="timetable-time"><?= $registrationStart ?>–<?= $registrationEnd ?></span> <span class="timetable-text">registration</span></p>
      <p class="day-1 row-3"><span class="timetable-time"><?= $page->round1()->toDate('H:i') ?></span> <span class="timetable-text">1st round</span></p>
      <p class="day-1 row-4"><span class="timetable-time"><?= $page->round2()->toDate('H:i') ?></span> <span class="timetable-text">2nd round</span></p>
      <p class="day-1 row-5"><span class="timetable-time"><?= $page->round3()->toDate('H:i') ?></span> <span class="timetable-text">3rd round</span></p>

      <h4 class="timetable-heading day-2"><?= $page->day2()->toDate('l d.m.Y')?></h4>
      <p class="day-2 row-2"><span class=timetable-time"><?= $page->round4()->toDate('H:i') ?></span> <span class="timetable-text">4th round</span></p>
      <p class="day-2 row-3"><span class=timetable-time"><?= $page->round5()->toDate('H:i') ?></span> <span class="timetable-text">5th round</span></p>
      <p class="day-2 row-4"><span class=timetable-time"><?= $page->prizegiving()->toDate('H:i') ?></span> <span class="timetable-text">prize giving</span></p>
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

  <!-- Registration -->
  <?php snippet('tournament-registration', compact('data')); ?>

  <!-- Registered Players -->
  <?php snippet('tournament-players', array('players' => $page->childrenAndDrafts())); ?>

  <?php snippet('template-debug', array('template' => 'tournament')) ?>
</main>

<?php snippet('footer') ?>
