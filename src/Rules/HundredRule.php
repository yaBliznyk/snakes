<?php

namespace Snakes\Rules;

/**
 * If your roll is near the end of the game and you do not roll enough to move exactly to 100, you do not move forward
 *
 * Class HundredRule
 * @package Snakes\Rules
 */
class HundredRule implements GameRuleInterface
{
    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function apply(int $position, int $diceValue): int
    {
        $newPosition = $position + $diceValue;
        if ($newPosition > 100) {
            return $position;
        }
        return $newPosition;
    }
}