<?php

$totalOverlaps = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        // Split line into the two sections
        $sections = explode(",", $line);

        // Split sections into ranges
        $sections[0] = explode("-", $sections[0]);
        $sections[1] = explode("-", $sections[1]);

        $firstSectionStarts = intval($sections[0][0]);
        $firstSectionEnds   = intval($sections[0][1]);

        $secondSectionStarts = intval($sections[1][0]);
        $secondSectionEnds   = intval($sections[1][1]);

        $firstRange  = range($firstSectionStarts, $firstSectionEnds);
        $secondRange = range($secondSectionStarts, $secondSectionEnds);

        if (count(array_intersect($firstRange, $secondRange)) !== 0) {
            $totalOverlaps += 1;
        }
     }
    fclose($puzzleInput);
 }

 echo($totalOverlaps);
 echo(PHP_EOL);

?>
