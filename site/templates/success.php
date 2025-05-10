
<?php snippet('header') ?>

  <main>
    <h2><?= $page->title() ?></h2>

   <section class="success-message">
<?= Str::template($page->text()->kirbytext(), [
  'name'    => $name,
  'turnier' => $turnier
]) ?>
   </section>

   <p>Back to the <a href="/turnier">Tournament Page</a></p>

    <aside class="template-marker">Template: Success</aside>
  </main>

<?php snippet('footer') ?>