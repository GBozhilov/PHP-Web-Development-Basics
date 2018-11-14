<?php
$operation = readline();
$num1 = intval(fgets(STDIN));
$num2 = intval(fgets(STDIN));

if ($operation == 'sum'):
    echo ' == ' . ($num1 + $num2);
elseif ($operation == 'subtract'):
    echo ' == ' . ($num1 - $num2);
else:
    echo ' == Wrong operation supplied!';
endif;