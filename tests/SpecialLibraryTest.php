<?php

use PHPUnit\Framework\TestCase;
use Eloquent\Phony\Phpunit\Phony;

require_once("SpecialLibrary.php");

final class SpecialLibraryTest extends \PHPUnit\Framework\TestCase
{

    public function testCallerRightString(): void
    {
        $testInput = Phony::stub()->returns("the right string");
        $targetOutput = "Caller success!\n";

        $testOutput = SpecialLibrary::caller($testInput);
        $this->assertEquals($targetOutput, $testOutput);
    }

    public function testCallerWrongString(): void
    {
        $testInput = Phony::stub()->returns("the wrong string");
        $targetOutput = "Caller failure.\n";

        $testOutput = SpecialLibrary::caller($testInput);
        $this->assertEquals($targetOutput, $testOutput);
    }

    public function testInstantiatorRightString(): void
    {
        $testInput = Phony::partialMock([
            "id" => "testInput right string",
            "getString" => Phony::stub()->returns("the right string")
        ]);

        $targetOutput = "Instantiator success!\n";

        $testOutput = SpecialLibrary::instantiator($testInput->get());
        $this->assertEquals($targetOutput, $testOutput);
    }

    public function testInstantiatorWrongString(): void
    {
        $mock_getString = Phony::stub()->returns("the wrong string");
        $testInput = Phony::partialMock([
            "id" => "testInput wrong string",
            "getString" => $mock_getString
        ]);

        $targetOutput = "Instantiator failure.\n";

        $testOutput = SpecialLibrary::instantiator($testInput->get());
        $this->assertEquals($targetOutput, $testOutput);
    }

};

?>
