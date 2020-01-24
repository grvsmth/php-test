<?php

require_once "SpecialLibrary.php";

$generateString = function() {
    return "the right string";
};

print(SpecialLibrary::caller($generateString));

?>
