<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Snakes\Rules\HundredRule;

final class HundredRuleTest extends TestCase
{
    public function testPositionCantBeMoreThenHundred(): void
    {
        $hundredRule = new HundredRule();
        $position = 99;
        $nextPosition = $hundredRule->apply($position, 2);
        $this->assertSame($position, $nextPosition);
    }

    public function testPositionCanBeLessOrEqualToHundred(): void
    {
        $hundredRule = new HundredRule();
        $nextPosition = $hundredRule->apply(98, 2);
        $this->assertSame(100, $nextPosition);
        $nextPosition = $hundredRule->apply(90, 2);
        $this->assertSame(92, $nextPosition);
    }
}