<?php
return function ($page) {
  // data from the session for the success template
  $session = kirby()->session();

  if ($session->get('origin') !== 'club-tournament-registration') {
    go('club-tournament');
  }

  $referer = $session->get('referer');
  $name = $session->get('name');

  return array(
    'referer' => $referer,
    'name' => $name,
  );
};