<?php

/**
 * Interface Birthday
 */
interface Birthday
{
    /**
     * @param string $year
     * @return bool
     */
    public function checkBirthdayYear(string $year): bool;
}

/**
 * Class Citizen
 */
class Citizen implements Birthday
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $id;

    /**
     * @var DateTime
     */
    private $birthdate;

    /**
     * Citizen constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$name, $age, $id, $birthdateStr] = $params;
        $birthdate = DateTime::createFromFormat('d/m/Y', $birthdateStr);
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthdate);
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
    private function setName(string $name): void
    {
        $this->name = $name;
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
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate->format('d/m/Y');
    }

    /**
     * @param DateTime $birthdate
     */
    private function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    private function getYear(): string
    {
        return $this->birthdate->format('Y');
    }

    /**
     * @param string $year
     * @return bool
     */
    public function checkBirthdayYear(string $year): bool
    {
        return $this->getYear() === $year;
    }
}

/**
 * Class Pet
 */
class Pet implements Birthday
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTime
     */
    private $birthdate;

    /**
     * Pet constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$name, $birthdateStr] = $params;
        $birthdate = DateTime::createFromFormat('d/m/Y', $birthdateStr);
        $this->setName($name);
        $this->setBirthdate($birthdate);
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
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate->format('d/m/Y');
    }

    /**
     * @param DateTime $birthdate
     */
    private function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    private function getYear(): string
    {
        return $this->birthdate->format('Y');
    }

    /**
     * @param string $year
     * @return bool
     */
    public function checkBirthdayYear(string $year): bool
    {
        return $this->getYear() === $year;
    }
}

/**
 * Class Robot
 */
class Robot implements Birthday
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $id;

    /**
     * Robot constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$model, $id] = $params;
        $this->setModel($model);
        $this->setId($id);
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    private function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $year
     * @return bool
     */
    public function checkBirthdayYear(string $year): bool
    {
        return false;
    }
}

$register = [];

while ('End' != $line = readline()) {
    $params = explode(' ', $line);
    $type = array_shift($params);

    if (!class_exists($type)) {
        throw new Exception('Non existing type!');
    }

    $register[] = new $type($params);
}

$year = readline();

foreach ($register as $obj) {
    if ($obj->checkBirthdayYear($year)) {
        echo $obj->getBirthdate() . PHP_EOL;
    }
}