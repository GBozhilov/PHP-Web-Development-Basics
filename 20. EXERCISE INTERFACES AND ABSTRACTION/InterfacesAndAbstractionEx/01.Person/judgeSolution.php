<?php

/**
 * Interface Person
 */
interface Person
{
    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @param int $age
     */
    public function setAge(int $age): void;

    /**
     * @return string
     */
    public function __toString(): string;
}

/**
 * Class Citizen
 */
class Citizen implements Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $age;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $output = $this->name . PHP_EOL;
        $output .= $this->age . PHP_EOL;

        return $output;
    }
}

$citizen = new Citizen(readline(), (int)readline());
echo $citizen;