<?php

$x = 1;
$cycle = 0;
$cycles = [];

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line    = trim(fgets($puzzleInput));
        $command = explode(" ", $line);

        if ($command[0] === "noop") {
            $cycle += 1;
            $cycles[$cycle] = $x;
        }

        if ($command[0] === "addx") {
            $cycle += 1;
            $cycles[$cycle] = $x;
            $cycle += 1;
            $cycles[$cycle] = $x;
            $x += $command[1];
        }
    }
    fclose($puzzleInput);
}

$position = 0;

foreach ($cycles as $cycle => $x) {
    if ($position === $x) {
        echo("#");
    } elseif ($position === ($x - 1)) {
        echo("#");
    } elseif ($position === ($x + 1)) {
        echo("#");
    } else { 
        echo(".");
    }
    $position++;
    if ($cycle % 40 === 0) {
        $position = 0;
        echo(PHP_EOL);
    } 
}

echo(PHP_EOL);

?>