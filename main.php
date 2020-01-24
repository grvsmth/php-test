<?php

require_once "SpecialLibrary.php";

$produceString = function() {
    return "the right string";
};

class StringProducer {
    public function getString() {
        return "the right string";
    }
}

print(SpecialLibrary::caller($produceString));
print(SpecialLibrary::instantiator(StringProducer::class));

?>
