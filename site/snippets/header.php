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

  <?php /* ── Meta description ─────────────────────────────────── */ ?>
  <?php $metaDesc = $page->description()->or($site->description()) ?>
  <?php if ($metaDesc->isNotEmpty()): ?>
  <meta name="description" content="<?= $metaDesc->escape() ?>">
  <?php endif ?>

  <?php /* ── Canonical ────────────────────────────────────────── */ ?>
  <link rel="canonical" href="<?= $page->url() ?>">

  <?php /* ── hreflang (in <head> — the only place Google reads it) */ ?>
  <?php foreach (kirby()->languages() as $lang): ?>
  <link rel="alternate" hreflang="<?= $lang->code() ?>" href="<?= $page->url($lang->code()) ?>">
  <?php endforeach ?>
  <link rel="alternate" hreflang="x-default" href="<?= $page->url(kirby()->defaultLanguage()->code()) ?>">

  <?php /* ── Open Graph ───────────────────────────────────────── */ ?>
  <?php $ogDesc  = $metaDesc->escape() ?>
  <?php $ogImage = $site->homePage()->file('parki.jpg') ?>
  <meta property="og:type"      content="<?= $page->isHomePage() ? 'website' : 'article' ?>">
  <meta property="og:title"     content="<?= $page->title()->escape() ?>">
  <meta property="og:url"       content="<?= $page->url() ?>">
  <meta property="og:site_name" content="<?= $site->title()->escape() ?>">
  <?php if ($ogDesc): ?>
  <meta property="og:description" content="<?= $ogDesc ?>">
  <?php endif ?>
  <meta property="og:locale"    content="<?= str_replace('-', '_', kirby()->language()->locale(LC_ALL)) ?>">
  <?php if ($ogImage): ?>
  <meta property="og:image"     content="<?= $ogImage->url() ?>">
  <meta property="og:image:alt" content="Go Club Zürich at Parki">
  <?php endif ?>

  <?php /* ── Twitter Card ─────────────────────────────────────── */ ?>
  <meta name="twitter:card"        content="<?= $ogImage ? 'summary_large_image' : 'summary' ?>">
  <meta name="twitter:title"       content="<?= $page->title()->escape() ?>">
  <?php if ($metaDesc->isNotEmpty()): ?>
  <meta name="twitter:description" content="<?= $metaDesc->escape() ?>">
  <?php endif ?>
  <?php if ($ogImage): ?>
  <meta name="twitter:image"     content="<?= $ogImage->url() ?>">
  <meta name="twitter:image:alt" content="Go Club Zürich at Parki">
  <?php endif ?>

  <?php /* ── JSON-LD (structured data) ─────────────────────────── */ ?>
  <?php snippet('json-ld') ?>

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
