<?php
$num = (float)readline();
$operations = explode(', ', readline());

foreach ($operations as $op) {
    switch ($op) {
        case 'chop':
            divideByTwo($num);
            break;
        case 'dice':
            dice($num);
            break;
        case 'spice':
            spice($num);
            break;
        case 'bake':
            bake($num);
            break;
        case 'fillet':
            fillet($num);
            break;
    }
}

function divideByTwo(&$num)
{
    $num /= 2;
    echo $num . PHP_EOL;
}

function dice(&$num)
{
    $num = sqrt($num);
    echo $num . PHP_EOL;
}

function spice(&$num)
{
    $num++;
    echo $num . PHP_EOL;
}

function bake(&$num)
{
    $num *= 3;
    echo $num . PHP_EOL;
}

function fillet(&$num)
{
    $num *= 0.8;
    echo $num . PHP_EOL;
}