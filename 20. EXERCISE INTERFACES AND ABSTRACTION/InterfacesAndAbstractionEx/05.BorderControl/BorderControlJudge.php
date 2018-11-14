<?php

/**
 * Interface Identity
 */
interface Identity
{
    /**
     * @param string $needle
     * @return bool
     */
    public function hasFakeId(string $needle): bool;
}

/**
 * Class Citizen
 */
class Citizen implements Identity
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
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     */
    public function __construct(string $name, int $age, string $id)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
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
     * @param string $needle
     * @return bool
     */
    public function hasFakeId(string $needle): bool
    {
        $length = strlen($needle);

        if ($length == 0) {
            return true;
        }

        return substr($this->getId(), -$length) === $needle;
    }
}

/**
 * Class Robot
 */
class Robot implements Identity
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
     * @param string $model
     * @param string $id
     */
    public function __construct(string $model, string $id)
    {
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
     * @param string $needle
     * @return bool
     */
    public function hasFakeId(string $needle): bool
    {
        $length = strlen($needle);

        if ($length == 0) {
            return true;
        }

        return substr($this->getId(), -$length) === $needle;
    }
}

$register = [];

while ('End' != $line = readline()) {
    $tokens = explode(' ', $line);

    $obj = null;

    if (count($tokens) == 3) {
        [$name, $age, $id] = $tokens;
        $obj = new Citizen($name, $age, $id);
    } elseif (count($tokens) == 2) {
        [$name, $id] = $tokens;
        $obj = new Robot($name, $id);
    }

    $register[] = $obj;
}

$needle = readline();

foreach ($register as $obj) {
    if ($obj->hasFakeId($needle)) {
        echo $obj->getId() . PHP_EOL;
    }
}