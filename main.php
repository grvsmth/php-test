<?php

require_once "SpecialLibrary.php";

function addStuff($inputString) {
    $modifiedInput = $inputString . " x5";
    $libraryOutput = SpecialLibrary::doublePrefix($modifiedInput);
    $modifiedOutput = $libraryOutput . " mod\n";

    return $modifiedOutput;
}

print(addStuff($argv[1]));

?>
