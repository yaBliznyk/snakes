<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Snakes\Rules\LadderRule;
use Snakes\Rules\SnakeRule;

final class LadderRuleTest extends TestCase
{
    public function testPositionUpToTenAfterStepIntoLadderPlace(): void
    {
        $snakeRule = new LadderRule();
        $position = 20;
        $nextPosition = $snakeRule->apply($position, 5);
        $this->assertSame(35, $nextPosition);
        $position = 50;
        $nextPosition = $snakeRule->apply($position, 5);
        $this->assertSame(65, $nextPosition);
    }

    public function testNotPositionUp(): void
    {
        $snakeRule = new SnakeRule();
        $position = 20;
        $nextPosition = $snakeRule->apply($position, 4);
        $this->assertSame(24, $nextPosition);
        $position = 50;
        $nextPosition = $snakeRule->apply($position, 3);
        $this->assertSame(53, $nextPosition);
    }
}