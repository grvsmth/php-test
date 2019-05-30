<?php

use PHPUnit\Framework\TestCase;
use Eloquent\Phony\Phpunit\Phony;

require_once("main.php");
require_once("SpecialLibrary.php");

final class SpecialLibraryTest extends \PHPUnit\Framework\TestCase
{

    public function testAddStuff(): void
    {
        $testInput = "foo";
        $mockOutput = "bar";
        $targetOutput = $mockOutput . " mod\n";

        $mockSpecialLibrary = Phony::mock(SpecialLibrary::class);
        $staticSpecialLibrary = Phony::onStatic($mockSpecialLibrary);
        $staticSpecialLibrary->prefix->returns($mockOutput);
        $mockClass = $staticSpecialLibrary->className();

        $testOutput = addStuff($testInput);
        $this->assertEquals($targetOutput, $testOutput);

    }

};

?>
