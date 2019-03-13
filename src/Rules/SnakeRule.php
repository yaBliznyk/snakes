<?php

namespace Snakes\Rules;

/**
 * If your new position after the roll divides by 9 (9, 18, 27, 36…) you landed on a snake and must move back 3 places
 *
 * Class SnakeRule
 * @package Snakes\Rules
 */
class SnakeRule implements GameRuleInterface
{
    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'snake';
    }

    /**
     * @inheritdoc
     */
    public function apply(int $position, int $diceValue): int
    {
        $newPosition = $position + $diceValue;
        if (($newPosition % 9) === 0) {
            return $newPosition - 3;
        }
        return $newPosition;
    }
}