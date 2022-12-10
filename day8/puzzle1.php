<?php

$map = [];

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        $map[] = str_split($line);
    }
    fclose($puzzleInput);
}

$visibleTrees = 0;

for ($i=0; $i < count($map); $i++) {
    for ($j=0; $j < count($map[0]); $j++) { 
        // Top row all visible
        if ($i === 0) {
            $visibleTrees++;
            continue;
        }

        // Bottom row all visible
        if ($i === (count($map) - 1)) {
            $visibleTrees++;
            continue;
        }

        // Left column all visible
        if ($j === 0) {
            $visibleTrees++;
            continue;
        }

        // Right column all visible
        if ($j === (count($map[0]) - 1)) {
            $visibleTrees++;
            continue;
        }

        // Get trees all around
        $treesToTheLeft  = [];
        $treesToTheRight = [];
        $treesAbove = [];
        $treesBelow = [];

        for ($k=0; $k < count($map[$i]); $k++) { 
            if ($k < $j) {
                $treesToTheLeft[] = $map[$i][$k];
            }
            if ($k > $j) {
                $treesToTheRight[] = $map[$i][$k];
            }
        }

        for ($k=0; $k < count($map); $k++) { 
            if ($k < $i) {
                $treesAbove[] = $map[$k][$j];
            }
            if ($k > $i) {
                $treesBelow[] = $map[$k][$j];
            }
        }

        $currentTree = $map[$i][$j];

        if ((count($treesToTheLeft) > 0) && (max($treesToTheLeft) < $currentTree)) {
            $visibleTrees++;
            continue;
        }

        if ((count($treesToTheRight) > 0) && (max($treesToTheRight) < $currentTree)) {
            $visibleTrees++;
            continue;
        }

        if ((count($treesAbove) > 0) && (max($treesAbove) < $currentTree)) {
            $visibleTrees++;
            continue;
        }

        if ((count($treesBelow) > 0) && (max($treesBelow) < $currentTree)) {
            $visibleTrees++;
            continue;
        }
    }
}

echo($visibleTrees);
echo(PHP_EOL);

?>
