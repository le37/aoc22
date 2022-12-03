<?php

// A Rock
// B Paper
// C Scissors

// X Rock (1 point)
// Y Paper (2 points)
// Z Scissors (3 points)

// Win (6 points)
// Draw (3 points)
// Loss (0 points)

$lose = [
    'A' => 'Z',
    'B' => 'X',
    'C' => 'Y',
];

$draw = [
    'A' => 'X',
    'B' => 'Y',
    'C' => 'Z',
];

$win = [
    'A' => 'Y',
    'B' => 'Z',
    'C' => 'X',
];

$points = [
    'X' => 1,
    'Y' => 2,
    'Z' => 3,
];

$totalPoints = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));
        $opponentsChoice = $line[0];
        $requiredOutcome = $line[2];

        if ($requiredOutcome === "X") {
            $totalPoints += $points[$lose[$opponentsChoice]] + 0;
            continue;
        }

        if ($requiredOutcome === "Y") {
            $totalPoints += $points[$draw[$opponentsChoice]] + 3;
            continue;
        }

        if ($requiredOutcome === "Z") {
            $totalPoints += $points[$win[$opponentsChoice]] + 6;
            continue;
        }

        $totalPoints += $points[$line];
     }
    fclose($puzzleInput);
 }

 echo($totalPoints);
 echo(PHP_EOL);

?>