<?php

namespace Snakes\Rules;

/**
 * Interface GameRuleInterface
 * @package Snakes\Rules
 */
interface GameRuleInterface
{
    /**
     * Return name of rule to output in console
     *
     * @return string
     */
    public function getName(): string;

    /**
     * apply rule to current position and dice value
     * return next position after applied rule
     *
     * @param int $position
     * @param int $diceValue
     * @return int
     */
    public function apply(int $position, int $diceValue): int;
}