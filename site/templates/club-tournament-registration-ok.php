<?php snippet('header') ?>

  <main>
    <h2><?= $page->title() ?></h2>

    <h3><?= $name ?> 🚀</h3>

    <?= $page->text()->kirbytext() ?>

   <p><?= t('backToClubTournament') ?></p>

    <?php snippet('template-debug', array('template' => 'club tournament registration ok')) ?>
  </main>

<?php snippet('footer') ?>