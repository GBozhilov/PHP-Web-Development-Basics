<?php

class Department
{
    private $name;
    private $employees = [];

    /**
     * Department constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function addEmployee($employee)
    {
        $this->employees[] = $employee;
    }

    public function getAverage(): float
    {
        $salaries = array_map(function (Employee $employee) {
            return $employee->getSalary();
        }, $this->getEmployees());
        $sumOfSalaries = array_sum($salaries);
        $count = count($salaries);
        $average = $sumOfSalaries / $count;

        return $average;
    }
}