<?php
use Snakes\Dice;
use Snakes\GameMaster;
use Snakes\GameState;
use Snakes\Rules\HundredRule;
use Snakes\Rules\LadderRule;
use Snakes\Rules\SnakeRule;
use Snakes\RulesBag;

require __DIR__ . '/vendor/autoload.php';

$gameState = new GameState(GameMaster::START_POSITION);
$dice = new Dice(1, 6, 0);
$rulesBag = new RulesBag();
$rulesBag->addRule(new SnakeRule());
$rulesBag->addRule(new LadderRule());
$rulesBag->addRule(new HundredRule());

$gameMaster = new GameMaster($gameState, $rulesBag, $dice);
$gameMaster->play();