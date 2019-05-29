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

    public function testDoublePrefix(): void
    {
        $testInput = "foo";
        $mockOutput = "bar";

        $mockSpecialLibrary = Phony::mock(SpecialLibrary::class);
        $staticSpecialLibrary = Phony::onStatic($mockSpecialLibrary);
        $staticSpecialLibrary->doublePrefix->returns($mockOutput);
        
        $testOutput = SpecialLibrary::doublePrefix($testInput);
        $this->assertEquals($testOutput, $mockOutput);

    }

};

?>
