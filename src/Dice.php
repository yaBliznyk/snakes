<?php

namespace Snakes;

use Snakes\Exception\GameErrorException;

/**
 * Class Dice
 * @package Snakes
 */
class Dice
{
    private $rollTime; //sec
    private $minValue;
    private $maxValue;

    /**
     * Dice constructor.
     * @param int $minValue
     * @param int $maxValue
     * @param int $rollTime
     * @throws GameErrorException
     */
    public function __construct(int $minValue, int $maxValue, int $rollTime = 1)
    {
        if ($maxValue < $minValue) {
            throw new GameErrorException('Dice min value must be lower or equal to max value');
        }

        if ($rollTime < 0) {
            throw new GameErrorException('Roll time must be grater or equal to zero');
        }
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->rollTime = $rollTime;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function roll(): int
    {
        sleep($this->rollTime);
        return random_int($this->minValue, $this->maxValue);
    }


}