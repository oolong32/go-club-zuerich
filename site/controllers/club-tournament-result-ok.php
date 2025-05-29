<?php
return function ($page) {
  // data from the session for the success template
  $session = kirby()->session();

  $referer = $session->get('referer');
  $playerA = $session->get('playerA');
  $playerB = $session->get('playerB');
  $result  = $session->get('result');

  if ($result === $playerA) {
    $result = $playerA . ' ' .t('wins');
  } elseif ($result === $playerB) {
    $result = $playerB . ' ' .t('wins');
  } else {
    $result = 'Jigo'; // sowieso der Fall, immerhin gross geschrieben
  }

  return array(
    'playerA' => $playerA,
    'playerB' => $playerB,
    'result' => $result,
  );
};