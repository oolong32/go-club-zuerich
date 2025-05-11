<?php snippet('header') ?>

  <main>
    <?= $page->text()->kirbytext() ?>

    <figure>
      <img src="/assets/img/parki.jpg" alt="A photo of our club location.">
      <!-- this should come from a field -->
    </figure>

    <aside class="template-marker">Template: Home</aside>
  </main>

<?php snippet('footer') ?>