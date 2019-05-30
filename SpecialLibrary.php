<?php

function prefix($inputString) {
    return "prefix " . $inputString;
}

function doublePrefix($inputString, $prefixFn = 'prefix') {
    $outputString = $inputString;
    for ($i = 0; $i < 2; $i++) {
        $outputString = $prefixFn($outputString);
    }
    return $outputString;
}

?>
