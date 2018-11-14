<?php
spl_autoload_register();

$studentParams = explode(' ', readline());
$workerParams = explode(' ', readline());

[$studentFirstName, $studentLastName, $facultyNumber] = $studentParams;
[$workerFirstName, $workerLastName, $weekSalary, $workHours] = $workerParams;

try {
    $student = new Student($studentFirstName, $studentLastName, $facultyNumber);
    $worker = new Worker($workerFirstName, $workerLastName, $weekSalary, $workHours);

    echo $student;
    echo PHP_EOL;
    echo $worker;
} catch (Exception $ex) {
    echo $ex->getMessage();
}