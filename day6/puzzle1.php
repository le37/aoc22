<?php

$charactersProcessed = 4;

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        // Split the line into individual characters
        $characters = str_split($line);

        // Init $lastFourCharacters to be the first 4 characters
        $lastFourCharacters = array_slice($characters, 0, 4);

        // Take characters 4 onwards for further processing
        $characters = array_slice($characters, 4);

        foreach ($characters as $character) {
            // Check to see if we have found the start-of-packet marker
            if (count(array_unique($lastFourCharacters)) === count($lastFourCharacters)) {
                break;
            }

            $lastFourCharacters = array_merge(array_slice($lastFourCharacters, 1, 3) , [$character]);
            $charactersProcessed += 1;
        }
    }
    fclose($puzzleInput);
}

echo($charactersProcessed);
echo(PHP_EOL);

?>
