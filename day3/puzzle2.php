<?php

$totalPriority = 0;
$elfGroups = [];

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        $elfGroups[] = $line;

        if (count($elfGroups) === 3) {

            // Split compartments into arrays of characters
            $elfGroups[0] = str_split($elfGroups[0], 1);
            $elfGroups[1] = str_split($elfGroups[1], 1);
            $elfGroups[2] = str_split($elfGroups[2], 1);

            $commonItems = array_intersect($elfGroups[0], $elfGroups[1], $elfGroups[2]);

            if (count($commonItems)) {
                // Only count the common items once
                $commonItem = array_pop($commonItems);
                // Calculate priority
                $commonItemLower = strtolower($commonItem);
                $priority = ord($commonItemLower) - 96;
                $totalPriority += $commonItemLower === $commonItem ? $priority : $priority + 26;
            }

            $elfGroups = [];
        }
     }
    fclose($puzzleInput);
 }

 echo($totalPriority);
 echo(PHP_EOL);

?>