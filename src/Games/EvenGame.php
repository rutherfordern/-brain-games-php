<?php

namespace BrainGamesPhp\Games\EvenGame;

use function cli\line;
use function cli\prompt;

const RULE = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function generateQuestion() {
    $digit = rand(1, 100);
    return $digit;
}

function gameLogic($question, $answerUser) {
    $correctAnswer = 'Correct!';
    $wrongAnswer = '"yes" is wrong answer ;(. Correct answer was "no".';
  
    if ($question % 2 === 0) {
      return $answerUser === 'yes' ? $correctAnswer : $wrongAnswer;
    }
    return $answerUser === 'no' ? $correctAnswer : $wrongAnswer;
}

function run() {
    line('Welcome to the Brain Games!');
  
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line(RULE);

    $counter = 0;
    $result = "";

    do {
        $question = generateQuestion();
        print_r("Question: {$question}\n");

        $answer = prompt("Your answer");

        $result = gameLogic($question, $answer);
        print_r("{$result}\n");

        $counter += 1;
    } while ($counter < 3 && $result === "Correct!");

    return $result === "Correct!" ? print_r("Congratulations, {$name}!") : print_r("Let's try again, {$name}!");
}
