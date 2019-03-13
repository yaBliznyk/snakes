<?php

namespace Snakes;

use Snakes\Rules\GameRuleInterface;

/**
 * Game logic controller
 *
 * Class GameMaster
 * @package Snakes
 */
class GameMaster
{
    public const START_POSITION = 1;
    public const END_POSITION = 100;

    /**
     * @var RulesBag
     */
    private $rules;

    /**
     * @var GameState
     */
    private $gameState;

    /**
     * @var Dice
     */
    private $dice;

    public function __construct(GameState $gameState, RulesBag $rules, Dice $dice)
    {
        $this->rules = $rules;
        $this->gameState = $gameState;
        $this->dice = $dice;
    }

    /**
     * play the game
     *
     * @throws \Exception
     */
    public function play(): void
    {
        while (true) {
            $diceValue = $this->dice->roll();
            $currentPosition = $this->gameState->getPosition();
            $newPosition = $this->rules->apply($currentPosition, $diceValue);
            $this->gameState->setPosition($newPosition);
            $this->printCurrentState($diceValue, $this->rules->getAppliedRules());
            if ($newPosition === self::END_POSITION) {
                break;
            }
        }
    }

    /**
     * console output
     *
     * @param int $diceValue
     * @param GameRuleInterface[] $rules
     */
    private function printCurrentState($diceValue, $rules): void
    {
        $positionDescription = '';
        foreach ($rules as $rule) {
            $positionDescription .= $rule->getName();
        }
        printf('%d - %s' . PHP_EOL, $diceValue, $positionDescription . $this->gameState->getPosition());
    }
}