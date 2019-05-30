<?php

namespace {
    function prefix($inputString) {
        return "prefix " . $inputString;
    }
}

namespace Example {
    function doublePrefix($inputString) {
        $outputString = $inputString;
        for ($i = 0; $i < 2; $i++) {
            $outputString = prefix($outputString);
        }
        return $outputString;
    }
}

?>
