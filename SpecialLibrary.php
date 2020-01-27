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

    public static function methodCaller($inputObject) {
        $outputString = $inputObject->getString();

        if ($outputString == "the right string") {
            return "MethodCaller success!\n";
        }
        return "MethodCaller failure.\n";
    }

}

?>
