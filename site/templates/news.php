<?php snippet('header') ?>

  <main>
    <h2><?= $page->title()->html() ?></h2>

    <?php foreach ($page->children()->listed()->flip() as $article): ?>

    <article class="news-item">
      <small><?= $article->date()->toDate('d.m.Y') ?></small>
      <h3><?= $article->title()->html() ?></h3>
      <?= $article->text()->kirbytext() ?>
    </article>

    <?php endforeach ?>

    <?php snippet('template-debug', ['template' => 'news']) ?>
    </main>
<?php snippet('footer') ?>