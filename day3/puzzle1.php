<?php

$totalPriority = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        // Split string into two compartments
        $compartments = str_split($line, strlen($line) / 2);

        // Split compartments into arrays of characters
        $compartments[0] = str_split($compartments[0], 1);
        $compartments[1] = str_split($compartments[1], 1);

        $commonItems = array_intersect($compartments[0], $compartments[1]);

        if (count($commonItems)) {
            // Only count the common items once
            $commonItem = array_pop($commonItems);
            // Calculate priority
            $commonItemLower = strtolower($commonItem);
            $priority = ord($commonItemLower) - 96;
            $totalPriority += $commonItemLower === $commonItem ? $priority : $priority + 26;
        }
     }
    fclose($puzzleInput);
 }

 echo($totalPriority);
 echo(PHP_EOL);

?>