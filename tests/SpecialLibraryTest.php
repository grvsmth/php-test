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

        // Stubbing the original function is only useful if you want to produce
        // a stub that "forwards" (defers) to the original function in some
        // specific cases.

        // Since you're not doing this, an "anonymous" stub will suffice:

        $stubPrefix = Phony::stub()->does(function ($inputString) {
            return "bar " . $inputString;
        });

        $this->assertEquals("prefix prefix foo", doublePrefix($testInput));
        $this->assertEquals("bar bar foo", doublePrefix($testInput, $stubPrefix));

        // but unless you plan to verify interactions with $stubPrefix, like so:

        $stubPrefix->calledWith("foo");
        $stubPrefix->calledWith("bar foo");

        // then of course, you don't need Phony at all:

        $prefixWithBaz = function ($inputString) {
            return "baz " . $inputString;
        };

        $this->assertEquals("baz baz foo", doublePrefix($testInput, $prefixWithBaz));

        // In some cases, you might be more concerned with how prefix is used by
        // doublePrefix, and don't actually want to change the behavior of
        // prefix at all. In these cases, a spy is a better option:

        $spyPrefix = Phony::spy('prefix');

        $this->assertEquals("prefix prefix foo", doublePrefix($testInput, $spyPrefix));
        $spyPrefix->calledWith("foo");
        $spyPrefix->calledWith("prefix foo");
    }

};

?>
