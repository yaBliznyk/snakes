<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Snakes\Rules\SnakeRule;

final class SnakeRuleTest extends TestCase
{
    public function testLostPositionAfterStepIntoSnake(): void
    {
        $snakeRule = new SnakeRule();
        $position = 5;
        $nextPosition = $snakeRule->apply($position, 4);
        $this->assertSame(6,  $nextPosition);
    }

    public function testNotLostPosition(): void
    {
        $snakeRule = new SnakeRule();
        $position = 6;
        $nextPosition = $snakeRule->apply($position, 4);
        $this->assertSame(10,  $nextPosition);
    }
}