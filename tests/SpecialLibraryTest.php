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

    public function testMethodCallerRightString(): void
    {
        $testInput = Phony::partialMock([
            "id" => "testInput right string",
            "getString" => function() {
                return "the right string";
            }
        ]);

        $targetOutput = "MethodCaller success!\n";

        $testOutput = SpecialLibrary::methodCaller($testInput->get());
        $this->assertEquals($targetOutput, $testOutput);
    }

    public function testMethodCallerWrongString(): void
    {
        $mock_getString = Phony::stub()->returns("the wrong string");
        $testInput = Phony::partialMock([
            "id" => "testInput wrong string",
            "getString" => $mock_getString
        ]);

        $targetOutput = "MethodCaller failure.\n";

        $testOutput = SpecialLibrary::methodCaller($testInput->get());
        $this->assertEquals($targetOutput, $testOutput);
    }

};

?>
