<?php
$arr = ['one', 'two', 'three'];

for ($i = 0; $i < count($arr); $i++) {
    echo sprintf('arr[%d] = %s', $i, $arr[$i]) . PHP_EOL;
}