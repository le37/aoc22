<?php

$totalCompleteOverlaps = 0;

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

        // First section contained in second section?
        if ($firstSectionStarts >= $secondSectionStarts && $firstSectionEnds <= $secondSectionEnds) {
            $totalCompleteOverlaps += 1;
            continue;
        }

        // Second section contained in first section?
        if ($secondSectionStarts >= $firstSectionStarts && $secondSectionEnds <= $firstSectionEnds) {
            $totalCompleteOverlaps += 1;
            continue;
        }
     }
    fclose($puzzleInput);
 }

 echo($totalCompleteOverlaps);
 echo(PHP_EOL);

?>
