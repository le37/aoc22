<?php

$stacks = [];
$parseStacks = true;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = fgets($puzzleInput);

        if (trim($line) === "") {
            $parseStacks = false;
            continue;
        }

        // Parse the initial stack configuration
        if ($parseStacks) {
            $lineIndex  = 0;
            $stackIndex = 0;
            while ($lineIndex < strlen($line)) {
                // Read 3 for box
                $box = trim(substr($line, $lineIndex, 3));
                // Advance indexes
                $lineIndex  += 4;
                $stackIndex += 1;
                if (($box !== "") && (strpos($box, "[") !== false)) {
                    if (array_key_exists($stackIndex, $stacks)) {
                        $stacks[$stackIndex][] = $box;
                    } else {
                        $stacks[$stackIndex] = [$box];
                    }
                }
            }
            continue;
        }

        // Parse move
        $move         = explode(" ", $line);
        $boxesToMove  = intval($move[1]);
        $sourceStack  = intval($move[3]);
        $targetStack  = intval($move[5]);

        // Make move
        $boxes = array_slice($stacks[$sourceStack], 0, $boxesToMove, true);

        $stacks[$sourceStack] = array_slice($stacks[$sourceStack], $boxesToMove);
        $stacks[$targetStack] = array_merge($boxes, $stacks[$targetStack]);
    }
    fclose($puzzleInput);
}

for ($i=1; $i < count($stacks) + 1; $i++) { 
    echo(str_replace(["[", "]"], "", $stacks[$i][0]));
}

echo(PHP_EOL);

?>
