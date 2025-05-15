
<?php snippet('header') ?>

  <main>
    <h2><?= $page->title() ?></h2>

   <section class="success-message">
<?= Str::template($page->text()->kirbytext(), [
  'name'    => $name,
  'turnier' => $turnier
]) ?>
   </section>

   <p><?php echo t('backToTournament') ?></p>

    <?php snippet('template-debug', ['template' => 'success']) ?>
  </main>

<?php snippet('footer') ?>