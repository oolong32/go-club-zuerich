<?php
// Club Tournament Controller
// Forms:
// - Registration
// - Result Submission

// aus dem Kirby-Kochbuch:
// getkirby.com/docs/cookbook/forms/creating-pages-from-frontend
// generiert einen Eintrag für jede Person, die sich registriert,
// Als child von /content/club-tournament (siehe auch turnier-template)

// Im Unterschied zum Turnier gibt es keine Weiterleitung auf Success

return function ($kirby, $page) {
  // Template Variables
  $players = $page
    ->childrenAndDrafts()
    ->filterBy('type', 'club-tournament-player')->sortBy('wins', 'desc');

  $games = $page
    ->childrenAndDrafts()
    ->filterBy('type', 'club-tournament-game');

  // reset $alert
  $alert = null;

  // club tournament REGISTRATION form has been posted
  if ($kirby->request()->is('POST') && get('club-tournament-register')) {

      // check the honeypot and exit if is has been filled in
      if (empty(get('website')) === false) {
          go($page->url());
          exit;
      }

      $data = array(
        'name' => trim(get('name')),
        'rank' => get('rank'),
      );

      $rules = array(
        'name' => array('required'),
        'rank' => array('required'),
      );

      $messages = array(
        'name'  => t('enterName'),     // t()
        'rank' => t('enterStrength'),
      );

      // some of the data is invalid
      if ($invalid = invalid($data, $rules, $messages)) {
          $alert = $invalid;

      } else {
        // submitted data: name, rank
        // if there is already one ore more players:
        // generate a game (file) for with each already existing player

        // authenticate as almighty
        $kirby->impersonate('kirby');

        // get already registered players
        $players = $page
          ->childrenAndDrafts()
          ->filterBy('type', 'club-tournament-player');
        if ( count($players) >= 1) {
          try {
            // for each existing player as player (player b)
            // create a game with this new player (player a)
            // ooooops, it creates games with oneself :-(
            // maybe only because of double posts, could be solved by redirect
            $playerA = $data['name'];
            foreach ($players as $player) {
              $playerB = $player->name();
              $game = $page->createChild(array(
                'slug' => str::slug($playerA . '-' . $playerB),
                'template' => 'club-tournament-game',
                'content' => array(
                  'type' => 'club-tournament-game',
                  'playerA' => $playerA,
                  'playerB' => $playerB,
                  'tags' => $playerA .', ' . $playerB,
                  'played' => False,
                  'result' => ''
                )
              ));
            }

          } catch (Exception $e) {
            $alert = array('Failed to create games: ' . $e->getMessage());
          }
        } // end if checking existing players

        try {
          // create file for player as subpage of current page
          $registration = $page->createChild(array(
            // 'slug'     => md5(str::slug($data['name'] . microtime())),
            'slug'     => str::slug($data['name'] . '_' . date('Y-m-d')),
            'template' => 'club-tournament-participant',
            'content'  => array(
              'name' => $data['name'],
              'rank' => $data['rank'],
              'wins' => 0,
              'type' => 'club-tournament-player'
            )
          ));

          if ($registration) {
            // everything went fine, go to success-page
            // store data in session
            $kirby->session()->set(array(
              'referer' => $page->uri(),
              'name'  => esc($data['name']),
            ));
          go('club-tournament-registration-ok');
          }
        } catch (Exception $e) {
          $alert = array('Failed to create player record: ' . $e->getMessage());
        }
      }
  } // end club tournament REGISTRATION form

  // club tournament RESULT form has been posted
  elseif ($kirby->request()->is('POST') && get('submit-result')) {
    $data = array(
        'result'  => get('result'),
        'playerA' => get('player-a'),
        'playerB' => get('player-b'),
        'playerAID' => get('player-a-id'),
        'playerBID' => get('player-b-id'),
        'gameID' => get('game-id'),
      ); // result kann ein Name sein oder "jigo"
      // how about the game’s uuid!?

      // write to game entry: result
      // write to winner empty update points
      $gamePage = $games->find($data['gameID']);
      if ($gamePage) {
        $kirby->impersonate('kirby');
        try {
          $gamePageUpdated = $gamePage->update([
            'result' => $data['result'],
            'played' => True,
          ]);
        } catch(Exception $e) {
          $alert = array('Failed to update Game: ' . $e->getMessage());
        }
      } else { $alert = array("no game found, id: ". $data['gameID']); }
      // game updated, now update winner’s points
      if ($data['result'] != 'jigo') {
        if ($data['result'] === $data['playerA']) {
          $winnerPage = $players->find($data['playerAID']);
        } else {
          $winnerPage = $players->find($data['playerBID']);
        }
        if ($winnerPage) {
          try {
            $wins = $winnerPage->wins()->int();
            $updatedWins = $wins + 1;
            $winnerPageUpdated = $winnerPage->update([
              'wins' => $updatedWins,
            ]);
          } catch(Exception $e) {
            $alert = array('Failed to update Wins: ' . $e->getMessage());
          }
        }
      }
      if ($gamePageUpdated) {
        // everything went fine, go to success-page
        // $winnerPageUpdated nicht abfragen, weil bei Jigo nix
        // store data in session
          $kirby->session()->set(array(
            'referer' => $page->uri(),
            'result'  => esc($data['result']),
            'playerA' => esc($data['playerA']),
            'playerB' => esc($data['playerB']),
          ));
        go('club-tournament-result-ok');
      }
  } // end 'submit-result' handler

  // return data to template
  return array(
    'alert' => $alert ?? null,
    'data'  => $data ?? false,
    'resultSuccess'  => $resultSuccess ?? false,
    'registrationSuccess'  => $registrationSuccess ?? false,
    'players' => $players,
    'games' => $games,
  );
};
