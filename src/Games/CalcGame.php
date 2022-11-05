<?php

namespace BrainGamesPhp\Games\CalcGame;

use function BrainGamesPhp\Engine\GameEngine\runGame;

const RULE = "What is the result of the expression?";

function start()
{
    runGame(RULE, fn() => gameLogic());
}

function gameLogic() {
    $question = generateQuestion();

    $expressionArray = explode(" ", $question);
    [$num1, $operator, $num2] = $expressionArray;

    $answer = 0;

    switch ($operator) {
        case '+':
            $answer = (int) $num1 + (int) $num2;
            break;
        case '-':
            $answer = (int) $num1 - (int) $num2;
            break;
        case '*':
            $answer = (int) $num1 * (int) $num2;
            break;
        default:
            $answer = "Неверный оператор";
      }

    return [$question, (string) $answer];
}

function generateQuestion() {
    $x = rand(100, 600);
    $y = rand(1, 20);
    
    $operators = ['+', '-', '*'];
    $operation = $operators[rand(0, 2)];
    
    $result = "{$x} {$operation} {$y}";
    return $result;
}