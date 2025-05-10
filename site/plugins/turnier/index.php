<?php

Kirby::plugin('turnierkit/turnier', [
  'hooks' => [
    'kirbytags:after' => function ($text, $data, $options) {
      $session = kirby()->session();

      if ($location = $session->get('referer')) {
        if ($page = page(urldecode($location))) {
          $title = $page->title();
        }
      }

      return Str::template($text, [
        'turnier' => $title ?? '',
        'name'  => $session->get('regName') ?? ''
      ]);
    }
  ],
]);
