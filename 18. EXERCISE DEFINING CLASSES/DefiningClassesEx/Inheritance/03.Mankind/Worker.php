<?php

/**
 * Class Worker
 */
class Worker extends Human
{
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * @var float
     */
    private $workHours;

    /**
     * @var float
     */
    private $salaryPerHour;

    /**
     * Worker constructor.
     * @param string $firstName
     * @param string $lastName
     * @param float $weekSalary
     * @param float $workHours
     */
    public function __construct(string $firstName, string $lastName,
                                float $weekSalary, float $workHours)
    {
        parent::__construct($firstName, $lastName);
        $this->setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHours($workHours);
        $this->setSalaryPerHour();
    }

    /**
     * @param mixed $lastName
     * @throws Exception
     */
    private function setLastName($lastName): void
    {
        if (strlen($lastName) <= 3) {
            throw new Exception('Expected length more than 3 symbols!Argument: lastName');
        }

        $this->lastName = $lastName;
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary <= 10) {
            throw new Exception('Expected value mismatch!Argument: weekSalary');
        }

        $this->weekSalary = $weekSalary;
    }

    /**
     * @param float $workHours
     * @throws Exception
     */
    private function setWorkHours(float $workHours): void
    {
        if ($workHours < 1 || $workHours > 12) {
            throw new Exception('Expected value mismatch!Argument: workHoursPerDay');
        }

        $this->workHours = $workHours;
    }

    public function setSalaryPerHour(): void
    {
        $this->salaryPerHour = $this->weekSalary / 7 / $this->workHours;
    }

    public function __toString()
    {
        $formattedSalary = number_format($this->weekSalary, 2, '.', '');
        $formattedHours = number_format($this->workHours, 2, '.', '');
        $salaryPerHour = number_format($this->salaryPerHour, 2, '.', '');

        $output = parent::__toString();
        $output .= 'Week Salary: ' . $formattedSalary . PHP_EOL;
        $output .= 'Hours per day: ' . $formattedHours . PHP_EOL;
        $output .= 'Salary per hour: ' . $salaryPerHour . PHP_EOL;

        return $output;
    }
}