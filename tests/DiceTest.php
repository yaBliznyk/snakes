<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Snakes\Dice;
use Snakes\Exception\GameErrorException;

final class DiceTest extends TestCase
{
    public function testDiceMinValueLessThenMaxValue(): void
    {
        $this->expectException(GameErrorException::class);
        new Dice(2, 1);
    }

    public function testDiceRollTimeLessThenZero(): void
    {
        $this->expectException(GameErrorException::class);
        new Dice(1, 6, -1);
    }

    public function testRollReturnBetweenOneAndTree(): void
    {
        $dice = new Dice(1, 3, 0);
        $testCount = 100;
        while ($value = $dice->roll()) {
            if ($testCount === 0) {
                break;
            }
            $this->assertTrue($value >=1 && $value <= 3);
            $testCount--;
        }
    }

    public function testRollReturnSeven(): void
    {
        $dice = new Dice(7, 7, 0);
        $this->assertSame(7, $dice->roll());
        $this->assertIsInt($dice->roll());
    }
}