<!DOCTYPE html>
<html lang="<?= kirby()->language()->code() ?>">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="<?= url('assets/img/') ?>favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php if ($page->template() == 'tournament'): ?>
  <meta name="robots" content="noindex, nofollow">
  <?php endif ?>
  <title><?= $page->isHomePage() ? $site->title() : $page->title() . ' | ' . $site->title() ?></title>
  <link rel="alternate" type="application/rss+xml" title="Zueri Go News" href="https://zurich.swissgo.org/news.rss">
  <?= css('/assets/css/reset.css') ?>
  <?= css('/assets/css/fonts.css') ?>
  <?= css('/assets/css/style.css') ?>
  <?= css('/assets/css/print.css') ?>
</head>

<body>
  <header>
    <h1>
      <a class="unstyled-link" href="<?= $site->url() ?>">
        <?= $site->title() ?>
      </a>
    </h1>

    <?php snippet('nav') ?>

  </header>
