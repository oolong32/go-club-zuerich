<?php
/**
 * XML Sitemap snippet
 * Rendered by the 'sitemap.xml' Kirby route in site/config/config.php.
 *
 * Excluded slugs (regardless of language):
 *   tournament2026, turnier2026  — noindex per robots.txt and meta
 *   club-tournament              — internal management page
 *   success, error               — system pages
 *   club-tournament-registration-ok, club-tournament-result-ok  — system pages
 *   info-letter-1st-of-march-2026  — internal letter, not for search
 */

$excludedSlugs = [
    'tournament2026',
    'turnier2026',
    'club-tournament',
    'klub-turnier',
    'success',
    'error',
    'club-tournament-registration-ok',
    'club-tournament-result-ok',
    'info-letter-1st-of-march-2026',
];

// All pages recursively (site()->index() includes home and every descendant).
// No ->listed() filter — home lives in content/home/ without a sort-number prefix
// and would be incorrectly excluded by listed().
$pages = site()->index()->filter(function ($page) use ($excludedSlugs) {
    return !in_array($page->slug(), $excludedSlugs, true);
});

$languages = kirby()->languages();

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xhtml="http://www.w3.org/1999/xhtml"
>
<?php foreach ($pages as $page): ?>
  <url>
    <loc><?= $page->url() ?></loc>
    <?php if ($page->modified()): ?>
    <lastmod><?= date('Y-m-d', $page->modified()) ?></lastmod>
    <?php endif ?>
    <?php foreach ($languages as $lang): ?>
    <xhtml:link rel="alternate" hreflang="<?= $lang->code() ?>" href="<?= $page->url($lang->code()) ?>"/>
    <?php endforeach ?>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?= $page->url(kirby()->defaultLanguage()->code()) ?>"/>
  </url>
<?php endforeach ?>
</urlset>
