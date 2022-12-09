<?php

$pwd  = "";
$dirs = [];

if ($puzzleInput = fopen("input.txt", "r")) {
    while(!feof($puzzleInput)) {
        $line = trim(fgets($puzzleInput));

        // Is this line a command?
        if (substr($line, 0, 1) === "$") {
            // Is this line a cd command?
            if (substr($line, 0, 4) === "$ cd") {
                $targetDir = substr($line, 5);

                if ($targetDir === "/") {
                    $pwd = $targetDir;
                } elseif ($targetDir === "..") {
                    $pwd = rtrim($pwd, "/");
                    $pwd = substr($pwd, 0, strrpos($pwd, "/") + 1);
                } else {
                    $pwd .= $targetDir . "/";
                }

                if (!array_key_exists($pwd, $dirs)) {
                    $dirs[$pwd] = [
                        "dirs" => [],
                        "size" => 0
                    ];
                }
            }
            continue;
        }

        if (substr($line, 0, 3) === "dir") {
            $dirs[$pwd]["dirs"][] = substr($line, 4);
        } else {
            $dirs[$pwd]["size"] = $dirs[$pwd]["size"] + intval(explode(" ", $line)[0]);
        }
    }
    fclose($puzzleInput);
}

$totalSpace     = 70000000;
$totalUsedSpace = 0;

// Find out how big root is
foreach ($dirs as $subDir => $subDirInfo) {
    if (strpos($subDir, "/") === 0) {
        $totalUsedSpace += $subDirInfo["size"];
    }
}

$totalUnusedSpace     = $totalSpace - $totalUsedSpace;
$spaceNeededForUpdate = 30000000 - $totalUnusedSpace;

$dirsBigEnoughToDelete = [];

foreach ($dirs as $dir => $dirInfo) {
    $dirSum = 0;
    foreach ($dirs as $subDir => $subDirInfo) {
        if (strpos($subDir, $dir) === 0) {
            $dirSum += $subDirInfo["size"];
        }
    }
    if ($dirSum >= $spaceNeededForUpdate) {
        $dirsBigEnoughToDelete[] = $dirSum;
    }
}

echo(min($dirsBigEnoughToDelete));
echo(PHP_EOL);

?>
