<?php

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

        $data = array(
          'name'       => get('name'),
          'email'      => get('email'),
          'rank'       => get('rank'),
          'age'        => get('age'),
          'club'       => get('club'),
          'workshop'   => get('workshop'),
          'remarks'    => get('remarks'),
        );

        $rules = array(
          'name'  => array('required'),
          'email' => array('required', 'email'),
        );

        // lässt sich folgendes mit translation-var übersetzen?
        $messages = array(
          'name'  => 'Please enter your <a href="#name">name</a>',
          'email' => 'Please enter a valid <a href="#email">email address</a>',
        );

        // some of the data is invalid
        if ($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

        } else {
            // authenticate as almighty
            $kirby->impersonate('kirby');

            // everything is ok, let’ send a confirmation mail
            try {
                $kirby->email(array(
                  'template' => 'confirmation',
                  'from'     => 'zuerigo@gmail.com',
                  'to'       => $data['email'],
                  'subject'  => 'Registration complete',
                  'data'     => array(
                    'tournament'   => $page->title(),
                    'name' => $data['name']
                    )
                  ));

                // Was noch fehlt: Info-Mail an Lorenz, mit $data['remarks']

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
                $registration = $page->createChild(array(
                  // 'slug'     => str::slug($data['name'] . '_' . date('Y-m-d_H-i-s')),
                  'slug'     => md5(str::slug($data['name'] . microtime())),
                  'template' => 'registration',
                  // registration-template gibts doch gar nicht!?
                  // darum wird auch überall ein "text" feld eingefügt,
                  // kommt aus default!?
                  'content'  => $data
                ));

                if ($registration) {
                    // store referer and name in session
                    $kirby->session()->set(array(
                      'referer' => $page->uri(),
                      'regName'  => esc($data['name'])
                    ));
                    go('success');
                }

            } catch (Exception $e) {
                $alert = array('Your registration failed: ' . $e->getMessage());
            }
        }
    }

    // return data to template
    return array(
      'alert' => $alert ?? null,
      'data'  => $data ?? false,
    );
};
