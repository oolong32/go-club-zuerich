<?php

function xml($string): string {
  return htmlspecialchars($string, ENT_XML1 | ENT_COMPAT, 'UTF-8');
}

header('Content-Type: application/rss+xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

$items = $page->children()->listed()->sortBy('date', 'desc')->limit(20);

?>
<rss version="2.0"
     xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title><?= xml($site->title()->value()) ?></title>
    <link><?= xml($page->url()) ?></link>
    <description><?= xml($page->title()->value()) ?></description>
    <language>de-CH</language>

    <!-- Atom self link to satisfy the validator -->
    <atom:link href="<?= xml($page->url() . '.rss') ?>"
               rel="self"
               type="application/rss+xml" />

    <?php foreach ($items as $item): ?>
    <item>
      <title><?= xml($item->title()->value()) ?></title>
      <link><?= xml($item->url()) ?></link>
      <guid><?= xml($item->url()) ?></guid>
      <pubDate><?= xml($item->date()->toDate('r')) ?></pubDate>
      <description><![CDATA[<?= $item->text()->kirbytext() ?>]]></description>
    </item>
    <?php endforeach ?>
  </channel>
</rss>
