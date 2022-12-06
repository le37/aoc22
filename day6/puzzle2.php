<?php

$markerLength = 14;
$charactersProcessed = $markerLength;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        // Split the line into individual characters
        $characters = str_split($line);

        // Init $lastNCharacters to be the first n characters
        $lastNCharacters = array_slice($characters, 0, $markerLength);

        // Take characters n onwards for further processing
        $characters = array_slice($characters, $markerLength);

        foreach ($characters as $character) {
            // Check to see if we have found the start-of-packet marker
            if (count(array_unique($lastNCharacters)) === count($lastNCharacters)) {
                break;
            }

            $lastNCharacters = array_merge(array_slice($lastNCharacters, 1, $markerLength - 1) , [$character]);
            $charactersProcessed += 1;
        }
    }
    fclose($puzzleInput);
}

echo($charactersProcessed);
echo(PHP_EOL);

?>
