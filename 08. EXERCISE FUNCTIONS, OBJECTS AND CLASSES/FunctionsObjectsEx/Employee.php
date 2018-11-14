<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $email = 'n/a';
    private $age = -1;

    /**
     * Employee constructor.
     * @param $name
     * @param $salary
     * @param $position
     */
    public function __construct(string $name, float $salary, string $position)
    {
        $this->setName($name);
        $this->setSalary($salary);
        $this->setPosition($position);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        $salary = number_format($this->getSalary(), 2, '.', '');
        $fields = [$this->getName(), $salary, $this->getEmail(), $this->getAge()];
        return implode(' ', $fields);
    }
}