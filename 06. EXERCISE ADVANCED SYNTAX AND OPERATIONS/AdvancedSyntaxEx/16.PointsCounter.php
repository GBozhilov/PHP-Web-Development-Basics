<?php
$trashSymbols = ['@', '%', '$', '*'];
$teamsInfo = [];

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

    if (!array_key_exists($team, $teamsInfo)) {
        $teamsInfo[$team] = [];
    }

    if (!array_key_exists($player, $teamsInfo[$team])) {
        $teamsInfo[$team][$player] = 0;
    }

    $teamsInfo[$team][$player] = $points;
}

$teamAndScore = [];
$teamAndPlayer = [];

foreach ($teamsInfo as $teamName => $playersAndScores) {
    $totalTeamScore = 0;
    $bestPlayer = '';
    $bestPlayerScore = 0;

    foreach ($playersAndScores as $player => $score) {
        $totalTeamScore += $score;

        if ($score > $bestPlayerScore) {
            $bestPlayerScore = $score;
            $bestPlayer = $player;
        }
    }

    $teamAndScore[$teamName] = $totalTeamScore;
    $teamAndPlayer[$teamName] = $bestPlayer;
}

arsort($teamAndScore);

foreach ($teamAndScore as $teamName => $teamScore) {
    echo "$teamName => $teamScore" . PHP_EOL;
    echo "Most points scored by $teamAndPlayer[$teamName]" . PHP_EOL;
}