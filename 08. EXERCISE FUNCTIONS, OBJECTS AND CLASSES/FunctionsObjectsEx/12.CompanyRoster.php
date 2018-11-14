<?php
require 'Employee.php';
require 'Department.php';

$departments = [];
$n = intval(readline());

for ($i = 0; $i < $n; $i++) {
    $params = explode(' ', readline());
    $name = $params[0];
    $salary = (float)$params[1];
    $position = $params[2];
    $department = $params[3];
    $employee = new Employee($name, $salary, $position);

    if (count($params) == 5) {
        $emailOrAge = $params[4];
        if (preg_match('/^\d+$/', $emailOrAge)) {
            $employee->setAge($emailOrAge);
        } else {
            $employee->setEmail($emailOrAge);
        }
    } elseif (count($params) > 5) {
        $email = $params[4];
        $age = (int)$params[5];
        $employee->setEmail($email);
        $employee->setAge($age);
    }

    if (!array_key_exists($department, $departments)) {
        $departments[$department] = new Department($department);
    }

    $departments[$department]->addEmployee($employee);
}

uasort($departments, function (Department $d1, Department $d2) {
    return $d2->getAverage() > $d1->getAverage();
});

$bestDepartment = key($departments);
$highlyPayedEmployees = $departments[$bestDepartment]->getEmployees();
usort($highlyPayedEmployees, function (Employee $e1, Employee $e2) {
    return $e2->getSalary() - $e1->getSalary();
});

echo "Highest Average Salary: $bestDepartment" . PHP_EOL;

foreach ($highlyPayedEmployees as $employee) {
    echo $employee . PHP_EOL;
}