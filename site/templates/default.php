<?php snippet('header') ?>

  <main>
    <?= $page->text()->kirbytext() ?>

    <?php snippet('template-debug', array('template' => 'default')) ?>

  </main>

<?php snippet('footer') ?>