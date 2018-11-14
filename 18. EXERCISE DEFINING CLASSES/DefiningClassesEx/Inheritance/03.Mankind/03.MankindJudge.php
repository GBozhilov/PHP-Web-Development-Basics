<?php

class Human
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    private function setFirstName(string $firstName): void
    {
        if (!$this->isCorrectName($firstName)) {
            throw new Exception('Expected upper case letter!Argument: firstName');
        }

        if (strlen($firstName) < 4) {
            throw new Exception('Expected length at least 4 symbols!Argument: firstName');
        }

        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    private function setLastName(string $lastName): void
    {
        if (!$this->isCorrectName($lastName)) {
            throw new Exception('Expected upper case letter!Argument: lastName');
        }

        if (strlen($lastName) < 3) {
            throw new Exception('Expected length at least 3 symbols!Argument: lastName');
        }

        $this->lastName = $lastName;
    }

    /**
     * @param string $name
     * @return bool
     */
    private function isCorrectName(string $name): bool
    {
        $firstLetter = $name[0];
        return $firstLetter === strtoupper($firstLetter);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $output = 'First Name: ' . $this->getFirstName() . PHP_EOL;
        $output .= 'Last Name: ' . $this->getLastName() . PHP_EOL;

        return $output;
    }
}

/**
 * Class Student
 */
class Student extends Human
{
    /**
     * @var string
     */
    private $facultyNumber;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $facultyNumber
     */
    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return string
     */
    public function getFacultyNumber(): string
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    public function setFacultyNumber(string $facultyNumber): void
    {
        if (!preg_match('/^\d{5,10}$/', $facultyNumber)) {
            throw new Exception('Invalid faculty number!');
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        $output = parent::__toString();
        $output .= 'Faculty number: ' . $this->getFacultyNumber() . PHP_EOL;

        return $output;
    }
}

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