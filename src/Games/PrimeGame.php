<?php

namespace BrainGamesPhp\Games\PrimeGame;

use function BrainGamesPhp\Engine\GameEngine\runGame;

const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function start()
{
    runGame(RULE, fn() => gameLogic());
}

function gameLogic()
{
    $question = rand(4, 40);
    $answer = isPrime($question) ? "yes" : "no";

    return [$question, $answer];
}

function isPrime(int $num)
{
    $i = 2;
    $limit = sqrt($num);

    while ($i <= $limit) {
        if ($num % $i === 0) {
            return false;
        }
        $i += 1;
    }

    return true;
}
