<?php
$trashSymbols = ['@', '%', '$', '*'];
$teamsAndPlayers = [];

while (true) {
    $inputLine = trim(fgets(STDIN));

    if ($inputLine == 'Result') {
        break;
    }

    $teamParams = explode('|', $inputLine);
    $team = $teamParams[0];
    $player = $teamParams[1];
    $points = floatval($teamParams[2]);

    if ($team != strtoupper($team)) {
        $temp = $team;
        $team = $player;
        $player = $temp;
    }

    $team = str_replace($trashSymbols, '', $team);
    $player = str_replace($trashSymbols, '', $player);

    if (!array_key_exists($team, $teamsAndPlayers)) {
        $teamsAndPlayers[$team] = [];
    }

    if (!array_key_exists($player, $teamsAndPlayers[$team])) {
        $teamsAndPlayers[$team][$player] = 0;
    }

    $teamsAndPlayers[$team][$player] = $points;
}

foreach ($teamsAndPlayers as $team => $playerAndScore) {
    echo '---' . $team . '---' . PHP_EOL;

    foreach ($playerAndScore as $player => $score) {
        echo "$player -> $score" . PHP_EOL;
    }
}