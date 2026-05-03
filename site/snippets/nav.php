<nav>
  <ul class="page-navigation">
	<li>
	  <a class="unstyled-link<?= $page->isHomePage() ? ' nav-active' : '' ?>" href="<?= $site->url() ?>">Home</a>
	</li>
    <?php foreach ($site->children()->listed()->filter(function ($item) {
      return in_array($item->slug(), [
        'club-tournament-registration-ok',
        'club-tournament-result-ok'
      ]) === false;
    }) as $item): ?>
    <li><a class="unstyled-link<?php e($item->isOpen(), ' nav-active') ?>" href="<?= $item->url() ?>"><?= $item->naviName() ?></a></li>
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