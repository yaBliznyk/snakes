<?php

namespace Snakes\Rules;

/**
 * Move forward 10 places if new position after the roll is 25 or 55
 *
 * Class LadderRule
 * @package Snakes\Rules
 */
class LadderRule implements GameRuleInterface
{
    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'ladder';
    }

    /**
     * @inheritdoc
     */
    public function apply(int $position, int $diceValue): int
    {
        $newPosition = $position + $diceValue;
        if (in_array($newPosition, [25, 55], true)) {
            return $newPosition + 10;
        }
        return $newPosition;
    }
}