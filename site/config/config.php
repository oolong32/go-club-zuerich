<?php

return array(
    'languages' => true,
    'languages.detect' => true,
    // smartypants = sprachspezifische interpunktion
    // https://getkirby.com/docs/reference/system/options/smartypants
    'smartypants' => true,

    'routes' => [
        [
            'pattern' => 'sitemap.xml',
            'method'  => 'GET',
            'action'  => function () {
                $content = snippet('sitemap', [], true);
                return new \Kirby\Http\Response($content, 'application/xml');
            }
        ]
    ],
);
