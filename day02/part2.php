<?php
$games = file('input.txt');

$winners = [
    'A' => 'Paper',
    'B' => 'Scissors',
    'C' => 'Rock'
];
$losers = [
    'A' => 'Scissors',
    'B' => 'Rock',
    'C' => 'Paper'
];
$moves = [
    'A' => 'Rock',
    'B' => 'Paper',
    'C' => 'Scissors'
];
$scores = [
    'Rock' => 1,
    'Paper' => 2,
    'Scissors' => 3
];

$totalScore = 0;

foreach ($games as $game) {
    $game = trim($game);
    list($move1, $move2) = explode(' ', $game);

    switch ($move2) {
        case 'X': // Losing moves
            $totalScore += $scores[$losers[$move1]];
            break;

        case 'Y': // draws
            $totalScore += 3 + $scores[$moves[$move1]];
            break;

        case 'Z': // Winning moves
            $totalScore += 6 + $scores[$winners[$move1]];
            break;

    }
}

echo $totalScore;