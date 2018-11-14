<?php
$questionsAndAnswers = explode(', ', readline());

echo getTemplate($questionsAndAnswers);

function getTemplate($questionsAndAnswers)
{
    $template = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $template .= "<quiz>" . PHP_EOL;

    for ($i = 0; $i < count($questionsAndAnswers) - 1; $i += 2) {
        $question = $questionsAndAnswers[$i];
        $answer = $questionsAndAnswers[$i + 1];
        $template .= "\t<question>" . PHP_EOL;
        $template .= "\t\t$question" . PHP_EOL;
        $template .= "\t</question>" . PHP_EOL;
        $template .= "\t<answer>" . PHP_EOL;
        $template .= "\t\t$answer" . PHP_EOL;
        $template .= "\t</answer>" . PHP_EOL;
    }

    $template .= "</quiz>";

    return $template;
}