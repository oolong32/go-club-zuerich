
<?php snippet('header') ?>

  <main>
    <h2><?= $page->title() ?></h2>

   <section class="success-message">
<?= Str::template($page->text()->kirbytext(), [
  'name'    => $name,
  'turnier' => $turnier
]) ?>
   </section>

   <!--
      Achtung
      en = tournament
      de = turnier
      Aber sowieso: der folgende Absatz muss übersetzt werden
      https://getkirby.com/docs/guide/languages/custom-language-variables
    -->
   <p>Back to the <a href="/turnier">Tournament Page</a></p>

    <aside class="template-marker">Template: Success</aside>
  </main>

<?php snippet('footer') ?>