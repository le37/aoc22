<?php

$tailPositions = ['00'];

$headX = 0;
$headY = 0;
$tailX = 0;
$tailY = 0;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        $direction = substr($line, 0, 1);
        $amount    = substr($line, 2);

        for ($i=0; $i < $amount; $i++) {
            if ($direction === "U") {
                $headY--;
            }
    
            if ($direction === "D") {
                $headY++;
            }
    
            if ($direction === "L") {
                $headX--;
            }
    
            if ($direction === "R") {
                $headX++;
            }

            echo($line);
            echo(PHP_EOL);
            echo("Head pos: " . $headX . "" . $headY);
            echo(PHP_EOL);
  
            // Check tail is adjacent
            if (abs($headX - $tailX) >= 2 || abs($headY - $tailY) >= 2) {
                echo("Tail not adjacent");
                echo(PHP_EOL);

                $sameRow    = $headY === $tailY;
                $sameColumn = $headX === $headY;

                if (!$sameColumn && !$sameRow) {
                    // Move diagonally
                    if ($direction === "U") {
                        $tailY = $tailY - 1;
                        $tailX = $headX;
                    }
            
                    if ($direction === "D") {
                        $tailY = $tailY + 1;
                        $tailX = $headX;
                    }

                    if ($direction === "L") {
                        $tailX = $headX + 1;
                        $tailY = $headY;
                    }
            
                    if ($direction === "R") {
                        $tailX = $headX - 1;
                        $tailY = $headY;
                    }
                } else {
                    if ($direction === "U") {
                        $tailY--;
                    }
            
                    if ($direction === "D") {
                        $tailY++;
                    }
            
                    if ($direction === "L") {
                        $tailX--;
                    }
            
                    if ($direction === "R") {
                        $tailX++;
                    }
                }
            } else {
                echo("Tail adjacent");
                echo(PHP_EOL);
            }

            echo("New tail pos: " . $tailX . "" . $tailY);
            echo(PHP_EOL);

            echo("~~~~~~~~~~~~~~~~~~~~~");
            echo(PHP_EOL);

            // Add tail position if not already seen
            if (!in_array($tailX . "" . $tailY, $tailPositions)) {
                $tailPositions[] = $tailX . "" . $tailY;
            }
        }
    }
    fclose($puzzleInput);
}

//print_r($tailPositions);
echo(count($tailPositions));
echo(PHP_EOL);

?>
