<?php

namespace Example;

use PHPUnit\Framework\TestCase;
use Eloquent\Phony\Phpunit\Phony;

require_once("SpecialLibrary.php");

final class SpecialLibraryTest extends \PHPUnit\Framework\TestCase
{

    protected function setUp(): void
    {
        $this->prefix = Phony::stubGlobal('prefix', __NAMESPACE__);
    }

    protected function tearDown(): void
    {
        Phony::restoreGlobalFunctions();
    }

    public function testPrefix(): void
    {
        $testInput = "foo";
        $targetOutput = "prefix foo";

        $this->prefix->forwards();

        $testOutput = prefix($testInput);
        $this->assertEquals($testOutput, $targetOutput);
    }

    public function testDoublePrefix(): void
    {
        $testInput = "foo";
        
        $stubOutput = "bar";
        $this->prefix->returns($stubOutput);

        $testOutput = doublePrefix($testInput);
        $this->assertEquals($testOutput, $stubOutput);

    }

};

?>
