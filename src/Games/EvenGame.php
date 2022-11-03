<?php

namespace BrainGamesPhp\Games\EvenGame;

use function cli\line;
use function cli\prompt;
use function BrainGamesPhp\Engine\GameEngine\runGame;

const RULE = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function start()
{
    runGame(RULE, fn() => gameLogic());
}

function gameLogic() {
    $question = rand(1, 100);
    $answer = isEven($question) ? "yes" : "no";

    return [$question, $answer];
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

