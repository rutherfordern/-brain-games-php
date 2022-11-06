<?php

namespace BrainGamesPhp\Games\ProgressionGame;

use function BrainGamesPhp\Engine\GameEngine\runGame;

const RULE = "What number is missing in the progression?";

function start()
{
    runGame(RULE, fn() => gameLogic());
}

function gameLogic()
{
    $arrayLength = rand(5, 10);
    $step = rand(1, 10);
    $digit = rand(1, 50);

    $progression = [];
    for ($i = 0; $i < $arrayLength; $i += 1) {
        $digit += $step;
        $progression[] = $digit;
    }

    $positionHidden = rand(0, $arrayLength - 1);
    $hiddenNum = $progression[$positionHidden];
    $progression[$positionHidden] = '..';

    $result = implode(" ", $progression);

    return [$result, (string) $hiddenNum];
}
