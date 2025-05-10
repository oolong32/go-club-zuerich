<?php
// generiert eine Teilnehmerliste im JSON-Format

$players = $pages->find('turnier')->childrenAndDrafts();
$json = [];

foreach($players as $player) {

  $json[] = [
    'name'   => (string)$player->name(),
    'rank' => (string)$player->rank(),
    'club'  => (string)$player->club(),
    'visibility'  => (string)$player->visibility()
  ];

}

echo json_encode($json);