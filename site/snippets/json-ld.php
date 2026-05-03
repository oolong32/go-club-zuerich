<?php
/**
 * JSON-LD structured data snippet.
 * Outputs schema.org markup on the homepage (SportsClub, WebSite, SportsEvent)
 * and on the info page (Person – club contact).
 */
$isHome = $page->isHomePage();
$isInfo = $page->id() === 'info';

if (!$isHome && !$isInfo) return;

$graph = [];

if ($isHome) {
    $graph[] = [
        '@type'         => 'SportsClub',
        '@id'           => $site->url() . '#sportsclub',
        'name'          => $site->title()->value(),
        'alternateName' => ['Go Club Zürich', "Baduk Club Zürich", "Weiqi Club Zürich"],
        'url'           => $site->url(),
        "description"   => "Go Club Zürich is the city's weekly meeting place for players of Go (Baduk, Weiqi). All skill levels welcome — beginners to professionals. We meet every Wednesday from 19:00.",
        'sport'         => 'https://en.wikipedia.org/wiki/Go_(game)',
        'address'       => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Wasserwerkstrasse 101',
            'postalCode'      => '8037',
            'addressLocality' => 'Zürich',
            'addressCountry'  => 'CH',
        ],
        'geo'                       => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 47.3905,
            'longitude' => 8.5276,
        ],
        'telephone'                 => '+41774173970',
        'sameAs'                    => 'https://wa.me/41774173970',
        'openingHoursSpecification' => [[
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => 'Wednesday',
            'opens'     => '19:00',
            'closes'    => '22:30',
        ]],
    ];

    $graph[] = [
        '@type' => 'WebSite',
        'name'  => $site->title()->value(),
        'url'   => $site->url(),
    ];

    $newsPage = $site->find('news');
    if ($newsPage) {
        $eventItem = $newsPage->children()->listed()->filter(function ($p) {
            return $p->eventstart()->isNotEmpty()
                && strtotime($p->eventend()->value()) > time();
        })->first();

        if ($eventItem) {
            $event = [
                '@type'               => 'SportsEvent',
                'name'                => $eventItem->title()->value(),
                'startDate'           => $eventItem->eventstart()->value(),
                'endDate'             => $eventItem->eventend()->value(),
                'eventStatus'         => 'https://schema.org/EventScheduled',
                'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
                'location'            => [
                    '@type'   => 'Place',
                    'name'    => $eventItem->eventvenuename()->value(),
                    'address' => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => $eventItem->eventvenuestreet()->value(),
                        'postalCode'      => $eventItem->eventvenuepostalcode()->value(),
                        'addressLocality' => $eventItem->eventvenuecity()->value() ?: 'Zürich',
                        'addressCountry'  => 'CH',
                    ],
                ],
                'organizer' => ['@id' => $site->url() . '#sportsclub'],
                'offers'    => [
                    '@type'         => 'Offer',
                    'price'         => $eventItem->eventprice()->value(),
                    'priceCurrency' => 'CHF',
                ],
            ];
            if ($eventItem->eventperformername()->isNotEmpty()) {
                $event['performer'] = [
                    '@type'  => 'Person',
                    'name'   => $eventItem->eventperformername()->value(),
                    'sameAs' => $eventItem->eventperformerurl()->value(),
                ];
            }
            $graph[] = $event;
        }
    }
}

if ($isInfo) {
    $graph[] = [
        '@type'    => 'Person',
        'name'     => 'Lorenz Trippel',
        'telephone' => '+41774173970',
        'sameAs'    => 'https://wa.me/41774173970',
        'email'    => 'ltrippel@gmail.com',
        'memberOf' => ['@id' => $site->url() . '#sportsclub'],
    ];
}
?>
<script type="application/ld+json">
<?= json_encode(
    ['@context' => 'https://schema.org', '@graph' => $graph],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
) ?>
</script>
