<?php
$elements = preg_split('/\s*,\s*/', trim(fgets(STDIN)));
$data = [];

foreach ($elements as $el) {
    if (!array_key_exists($el, $data)) {
        $data[$el] = 0;
    }

    $data[$el]++;
}

unsetDuplicates($data);
echo implode(' ', array_keys($data));

function unsetDuplicates(array &$data)
{
    foreach ($data as $key => $value) {
        if ($value > 1) {
            unset($data[$key]);
        }
    }
}