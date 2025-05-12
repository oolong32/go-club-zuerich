<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="#">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $site->title() ?></title>
  <?= css('/assets/css/reset.css') ?>
  <?= css('/assets/css/fonts.css') ?>
  <?= css('/assets/css/style.css') ?>
</head>

<body>
  <header>
    <h1>
      <a class="unstyled-link" href="<?= $site->url() ?>">
        <?= $site->title() ?>
      </a>
    </h1>

    <nav>
      <ul class="page-navigation">
        <?php foreach ($site->children()->listed() as $item): ?>
        <li><a class="unstyled-link" href="<?= $item->url() ?>"><?= $item->naviName() ?></a></li>
        <?php endforeach ?>
      </ul>

      <ul class="language-switch">
        <?php foreach($kirby->languages() as $language): ?>
        <li<?php e($kirby->language() == $language, ' class="active"') ?>>
          <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
            <?= html($language->name()) ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
    </nav>

  </header>
