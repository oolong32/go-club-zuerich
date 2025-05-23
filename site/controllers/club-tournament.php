<?php

// Club Turnier Controller

// aus dem Kirby-Kochbuch
// https://getkirby.com/docs/cookbook/forms/creating-pages-from-frontend
// generiert einen Eintrag für jede Person, die sich registriert,
// Als child von /content/turnier, siehe turnier-template,
// dann weiterleitung auf success, dazu braucht es einen Controller,
// um den Namen aus der Session abzuleiten, siehe /site/controller/success

return function ($kirby, $page) {

  // if the form has been submitted…
  if ($kirby->request()->is('POST') && get('register')) {

    // check the honeypot and exit if is has been filled in
    if (empty(get('website')) === false) {
      go($page->url());
      exit;
    }

    $data = [
      'name'       => get('name'),
      'rank'       => get('rank'),
    ];

    $rules = [
      'name'  => ['required'],
      'rank'       => get('rank'),
    ];

    // lässt sich folgendes mit translation-var übersetzen?
    $messages = [
      'name'  => 'Please enter your <a href="#name">name</a>',
      'rank' => 'Please enter a valid <a href="#email">rank</a>',
    ];

    // some of the data is invalid
    if ($invalid = invalid($data, $rules, $messages)) {
      $alert = $invalid;

    } else {
      // authenticate as almighty
      $kirby->impersonate('kirby');

      // everything is ok, let’ send a confirmation mail
      // mail nicht nötig,
      try {
        $kirby->email([
          'template' => 'confirmation',
          'from'     => 'zuerigo@gmail.com',
          'to'       => $data['email'],
          'subject'  => 'Registration complete',
          'data'     => [
            'tournament'   => $page->title(),
            'name' => $data['name']
            ]
          ]);

        } catch (Exception $error) {
          if (option('debug')):
            $alert['error'] = 'The confirmation mail could not be sent: <strong>' . $error->getMessage() . '</strong>';
          else:
            $alert['error'] = 'The confirmation mail could not be sent!';
          endif;
        }

        // everything is ok, let’s try to create a new registration
        try {
          // we store registrations as subpages of the current page
          $registration = $page->createChild([
            // 'slug'     => str::slug($data['name'] . '_' . date('Y-m-d_H-i-s')),
            'slug'     => md5(str::slug($data['name'] . microtime())),
            'template' => 'registration',
            'content'  => $data
          ]);

          if ($registration) {
            // store referer and name in session
            $kirby->session()->set([
              'referer' => $page->uri(),
              'regName'  => esc($data['name'])
            ]);
            go('success');
          }

        } catch (Exception $e) {
          $alert = ['Your registration failed: ' . $e->getMessage()];
        }
      }
    }

    // return data to template
    return [
      'alert' => $alert ?? null,
      'data'  => $data ?? false,
    ];
  };
