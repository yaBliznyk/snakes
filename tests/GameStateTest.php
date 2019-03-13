<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Snakes\GameState;

final class GameStateTest extends TestCase
{
    public function testStateHasOnlyIntegerValue(): void
    {
        $this->expectException(\TypeError::class);
        new GameState('abc');
    }

    public function testStateNotChangedInBackground(): void
    {
        $state = new GameState(100);
        $this->assertSame(100, $state->getPosition(), 'state position must be equal 100');
    }

    public function testSetStateCanGetOnlyIntegerValue(): void
    {
        $state = new GameState(100);
        $this->expectException(\TypeError::class);
        $state->setPosition('abc');
    }
}