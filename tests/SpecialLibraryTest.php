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

        $testOutput = prefix($testInput);
        $this->assertEquals($testOutput, $targetOutput);
    }

    public function testDoublePrefix(): void
    {
        $testInput = "foo";
        
        $stubOutput = "bar";
        $stubPrefix = Phony::stub("prefix")->returns($stubOutput);

        $testOutput = doublePrefix($testInput);
        $this->assertEquals($testOutput, $stubOutput);

    }

};

?>
