<?php

class SpecialLibrary
{

    public static function caller($inputFunction) {
        $outputString = $inputFunction();
        if ($outputString == "the right string") {
            return "Success!\n";
        }
        return "Failure";
    }

}

?>
