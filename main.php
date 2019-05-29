<?php

require_once "SpecialLibrary.php";

function addStuff($inputString) {
    $modifiedInput = $inputString . " x5";
    $libraryOutput = prefix($modifiedInput);
    $modifiedOutput = $modifiedInput . " mod\n";

    return $modifiedOutput;
}

print(addStuff($argv[1]));

?>
