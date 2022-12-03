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

$points = [
    'A X' => 1 + 3,
    'A Y' => 2 + 6,
    'A Z' => 3 + 0, 
    'B X' => 1 + 0,
    'B Y' => 2 + 3,
    'B Z' => 3 + 6, 
    'C X' => 1 + 6,
    'C Y' => 2 + 0,
    'C Z' => 3 + 3, 
];

$totalPoints = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));
        $totalPoints += $points[$line];
     }
    fclose($puzzleInput);
 }

 echo($totalPoints);
 echo(PHP_EOL);

?>