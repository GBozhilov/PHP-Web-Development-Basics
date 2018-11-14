<?php
$name = readline();
$age = (int)readline();
$grade = (float)readline();
$gradeStr = number_format($grade, 2, '.', '');

echo "Name: $name, Age: $age, Grade: $gradeStr";