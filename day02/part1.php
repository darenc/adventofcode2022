<?php
$games = file('input.txt');

$scores = [
    'X' => 1,
    'Y' => 2,
    'Z' => 3
];

$totalScore = 0;

foreach ($games as $game) {
    $game = trim($game);
    list($move1, $move2) = explode(' ', $game);

    switch ($game) {
        // Winning moves
        case 'A Y': // Rock Paper
        case 'B Z': // Paper Scissors
        case 'C X': // Scissors Rock
            $totalScore += 6 + $scores[$move2];
            break;

        // Losing moves
        case 'A Z': // Rock Scissors
        case 'B X': // Paper Rock
        case 'C Y': // Scissors Paper
            $totalScore += $scores[$move2];
            break;

        // draws
        default:
            $totalScore += 3 + $scores[$move2];
            break;
    }
}

echo $totalScore;