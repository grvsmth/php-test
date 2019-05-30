<?php

use PHPUnit\Framework\TestCase;
use Eloquent\Phony\Phpunit\Phony;

require_once("SpecialLibrary.php");

final class SpecialLibraryTest extends \PHPUnit\Framework\TestCase
{

    public function testPrefix(): void
    {
        $testInput = "foo";
        $targetOutput = "prefix foo";

        $testOutput = SpecialLibrary::prefix($testInput);
        $this->assertEquals($testOutput, $targetOutput);
    }

    /**
     * As I understand the Phony documentation, this function is supposed to
     * create a mock of SpecialLibrary, and calls to that mock will not call
     * the original SpecialLibrary.  In practice, it calls the original
     * SpecialLibrary.  It's not clear how this is supposed to work.
     */
    public function testDoublePrefix(): void
    {
        $testInput = "foo";
        $mockOutput = "bar";

        $mockSpecialLibrary = Phony::mock(SpecialLibrary::class);
        $staticSpecialLibrary = Phony::onStatic($mockSpecialLibrary);
        $staticSpecialLibrary->prefix->returns($mockOutput);
        $mockClass = $staticSpecialLibrary->className();

        $testOutput = $mockClass::doublePrefix($testInput);
        $this->assertEquals($testOutput, $mockOutput);

    }

};

?>
