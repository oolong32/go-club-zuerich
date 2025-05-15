<?php snippet('header') ?>

  <main>
    <?= $page->text()->kirbytext() ?>

    <?php snippet('template-debug', ['template' => 'default']) ?>

  </main>

<?php snippet('footer') ?>