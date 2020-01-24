<?php

use PHPUnit\Framework\TestCase;
use Eloquent\Phony\Phpunit\Phony;

require_once("SpecialLibrary.php");

final class SpecialLibraryTest extends \PHPUnit\Framework\TestCase
{

    public function testCallerRightString(): void
    {
        $testInput = Phony::stub()->returns("the right string");
        $targetOutput = "Success!\n";

        $testOutput = SpecialLibrary::caller($testInput);
        $this->assertEquals($testOutput, $targetOutput);
    }

    public function testCallerWrongString(): void
    {
        $testInput = Phony::stub()->returns("the wrong string");
        $targetOutput = "Failure.\n";

        $testOutput = SpecialLibrary::caller($testInput);
        $this->assertEquals($testOutput, $targetOutput);
    }


};

?>
