<?php snippet('header') ?>

  <main>
    <h2><?= $page->title() ?></h2>

    <?= $page->text()->kirbytext() ?>

    <h3><?= t('game') . ' ' . $playerA ?>–<?= $playerB ?>: <?= $result ?></h3>

   <p><?= t('backToClubTournament') ?></p>

    <?php snippet('template-debug', array('template' => 'club tournament result ok')) ?>
  </main>

<?php snippet('footer') ?>