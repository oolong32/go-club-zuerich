<?php snippet('header') ?>

  <main>
    <?= $page->text()->kirbytext() ?>

    <!-- das muss optional sein, und ein feld dafür haben -->
    <figure>
      <img src="/assets/img/parki.jpg" alt="A photo of our club location.">
      <!-- this should come from a field -->
    </figure>


    <aside class="template-marker">Template: Default</aside>
  </main>

<?php snippet('footer') ?>