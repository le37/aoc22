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

$c20  = 20 * $cycles[20];
$c60  = 60 * $cycles[60];
$c100 = 100 * $cycles[100];
$c140 = 140 * $cycles[140];
$c180 = 180 * $cycles[180];
$c220 = 220 * $cycles[220];

echo($c20 + $c60 + $c100 + $c140 + $c180 + $c220);
echo(PHP_EOL);

?>