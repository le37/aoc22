<?php

$elfWithMostCals  = null;
$mostCals = 0;

$currentElf  = 1;
$currentCals = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));
        if ($line === '') {
            // New elf with most cals?
            if ($currentCals > $mostCals) {
                $elfWithMostCals = $currentElf;
                $mostCals = $currentCals;
            }
            // New elf
            $currentElf++;
            $currentCals = 0;
        } else {
            // Count the calories
            $currentCals += intval($line);
        }
     }
    fclose($puzzleInput);
 }

 echo $elfWithMostCals;
 echo PHP_EOL;
 echo $mostCals;

?>