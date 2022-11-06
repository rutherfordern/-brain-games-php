<?php

namespace BrainGamesPhp\Engine\GameEngine;

use function cli\line;
use function cli\prompt;

function runGame($rule, $getLogicGame)
{
    line('Welcome to the Brain Games!');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);

    $counter = 0;
    $result = "";

    do {
        [$question, $answerGame] = $getLogicGame();
        line("Question: {$question}");

        $answerUser = prompt("Your answer");

        if ($answerGame !== $answerUser) {
            $result = "'{$answerUser}' is wrong answer. Correct answer was '{$answerGame}'.";
            line($result);
        } else {
            $result = "Correct!";
            line($result);
        }

        $counter += 1;
    } while ($counter < 3 && $result === "Correct!");

    return $result === "Correct!" ? line("Congratulations, {$name}!") : line("Let's try again, {$name}!");
}
