<?php

class SpecialLibrary
{

    public static function prefix($inputString) {
        return "prefix " . $inputString;
    }

    public static function doublePrefix($inputString) {
        $outputString = $inputString;
        for ($i = 0; $i < 2; $i++) {
            $outputString = static::prefix($outputString);
        }
        return $outputString;
    }
}

?>
