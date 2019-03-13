<?php

namespace Snakes;

use Snakes\Rules\GameRuleInterface;

/**
 * Make apply multiple rules at once
 *
 * Class RulesBag
 * @package Snakes
 */
class RulesBag
{
    /**
     * @var GameRuleInterface[]
     */
    protected $appliedRules = [];

    /**
     * @var GameRuleInterface[]
     */
    protected $rules = [];

    /**
     * @param GameRuleInterface $rule
     * @return RulesBag
     */
    public function addRule(GameRuleInterface $rule): RulesBag
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function apply(int $position, int $diceValue): int
    {
        $this->appliedRules = [];
        $nextPosition = $position + $diceValue;
        foreach ($this->rules as $rule) {
            $nextPosition = $rule->apply($position, $diceValue);
            if ($nextPosition !== $position + $diceValue) {
                $position = $nextPosition - $diceValue;
                $this->appliedRules[] = $rule;
            }
        }
        return $nextPosition;
    }

    /**
     * @return GameRuleInterface[]
     */
    public function getAppliedRules(): array
    {
        return $this->appliedRules;
    }
}