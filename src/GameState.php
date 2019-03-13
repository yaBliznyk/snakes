<?php

namespace Snakes;

/**
 * Game position state
 *
 * Class GameState
 * @package Snakes
 */
class GameState
{
    /**
     * @var int
     */
    private $position;

    /**
     * GameState constructor.
     * @param int $initialPosition
     */
    public function __construct(int $initialPosition)
    {
        $this->position = $initialPosition;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}