<nav>
  <ul class="page-navigation">
	<li>
	  <a class="unstyled-link" href="<?= $site->url() ?>" <?php echo $page->isHomePage() ? ' style="text-decoration: underline;"' : '' ?>>Home</a>
	</li>
    <?php foreach ($site->children()->listed() as $item): ?>
    <li><a class="unstyled-link" href="<?= $item->url() ?>"<?php e($item->isOpen(), ' style="text-decoration: underline;"') ?>><?= $item->naviName() ?></a></li>
    <?php endforeach ?>
  </ul>

  <ul class="language-switch">
    <?php foreach ($kirby->languages() as $language): ?>
    <li<?php e($kirby->language() == $language, ' class="active"') ?>>
      <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
        <?= html($language->name()) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>