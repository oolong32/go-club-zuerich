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
      <a href="<?= $site->url() ?>">
        <?= $page->title() ?>
      </a>
    </h1>

    <nav>
      <ul>
        <?php foreach ($site->children() as $item): ?>
        <li><a href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
        <?php endforeach ?>
      </ul>
    </nav>

  </header>

  <main></main>

  <footer></footer>
</body>

</html>