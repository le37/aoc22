<?php

$elfCalsTopThree = [0, 0, 0];
$currentCals = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));
        if ($line === '') {
            // New fat elf?
            sort($elfCalsTopThree);
            if ($currentCals > $elfCalsTopThree[0]) {
                $elfCalsTopThree[0] = $currentCals;
            }
            $currentCals = 0;
        } else {
            // Count the calories
            $currentCals += intval($line);
        }
     }
    fclose($puzzleInput);
 }

echo(array_sum($elfCalsTopThree));

?>