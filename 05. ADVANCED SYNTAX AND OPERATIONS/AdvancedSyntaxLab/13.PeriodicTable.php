<?php
$inputArr = explode(', ', readline());
$elements = [];

foreach ($inputArr as $el) {
    if (array_key_exists($el, $elements)) {
        $elements[$el]++;
    } else {
        $elements[$el] = 1;
    }
}

unsetDuplicates($elements);
echo implode(' ', array_keys($elements));

function unsetDuplicates(&$elements)
{
    foreach ($elements as $el => $occurrence) {
        if ($occurrence > 1) {
            unset($elements[$el]);
        }
    }
}