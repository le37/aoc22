<?php

$map = [];

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        $map[] = str_split($line);
    }
    fclose($puzzleInput);
}

$bestScenicScore = 0;

for ($i=0; $i < count($map); $i++) {
    for ($j=0; $j < count($map[0]); $j++) { 
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

        // Lazily just reverse these arrays to get the trees in the right order
        $treesToTheLeft = array_reverse($treesToTheLeft);
        $treesAbove = array_reverse($treesAbove);

        $currentTree = $map[$i][$j];

        $scenicScoreUp = 0;
        $scenicScoreDown = 0;
        $scenicScoreLeft = 0;
        $scenicScoreRight = 0;

        foreach ($treesAbove as $tree) {
            $scenicScoreUp++;
            if ($tree >= $currentTree) {
                break;
            }
        }

        foreach ($treesBelow as $tree) {
            $scenicScoreDown++;
            if ($tree >= $currentTree) {
                break;
            }
        }

        foreach ($treesToTheLeft as $tree) {
            $scenicScoreLeft++;
            if ($tree >= $currentTree) {
                break;
            }
        }

        foreach ($treesToTheRight as $tree) {
            $scenicScoreRight++;
            if ($tree >= $currentTree) {
                break;
            }
        }

        $scenicScore = $scenicScoreUp * $scenicScoreDown * $scenicScoreLeft * $scenicScoreRight;

        if ($scenicScore > $bestScenicScore) {
            $bestScenicScore = $scenicScore;
        }

    }
}

echo($bestScenicScore);
echo(PHP_EOL);

?>
