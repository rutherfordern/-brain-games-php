<?php

namespace BrainGamesPhp\Games\GcdGame;

use function BrainGamesPhp\Engine\GameEngine\runGame;

const RULE = "Find the greatest common divisor of given numbers.";

function start()
{
    runGame(RULE, fn() => gameLogic());
}

function gameLogic() {
    $question = generateQuestion();

    $expressionArray = explode(" ", $question);
    [$num1, $num2] = $expressionArray;

    $answer = getGcd((int) $num1, (int) $num2);

    return [$question, (string) $answer];
}

function generateQuestion() {
    $x = rand(1, 50);
    $y = rand(1, 50);
    
    $result = "{$x} {$y}";
    return $result;
}

function getGcd($num1, $num2)
{
    $a = abs($num1);
    $b = abs($num2);
  
    if ($b > $a) {
      $temp = $a;
      $a = $b;
      $b = $temp;
    }
  
    while (true) {
      if ($b === 0) return $a;
      $a %= $b;
      if ($a === 0) return $b;
      $b %= $a;
    }
}