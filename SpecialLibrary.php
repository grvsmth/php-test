<?php

class SpecialLibrary
{

    public static function caller($inputFunction) {
        $outputString = $inputFunction();
        if ($outputString == "the right string") {
            return "Caller success!\n";
        }
        return "Caller failure.\n";
    }

    public static function instantiator($inputClass) {
        $myObject = new $inputClass();

        $outputString = $myObject->getString();
        if ($outputString == "the right string") {
            return "Instantiator success!\n";
        }
        return "Instantiator failure.\n";
    }

}

?>
