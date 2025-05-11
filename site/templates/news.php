<?php snippet('header') ?>

  <main>
    <h2><?= $page->title()->html() ?></h2>

    <?php foreach ($page->children()->listed()->flip() as $article): ?>

    <article class="news-item">
      <small><?= $article->date()->html() ?></small>
      <h3><?= $article->title()->html() ?></h3>
      <div><?= $article->text()->kirbytext() ?></div>
    </article>

    <?php endforeach ?>

    <aside class="template-marker">Template: News</aside>
    </main>
<?php snippet('footer') ?>