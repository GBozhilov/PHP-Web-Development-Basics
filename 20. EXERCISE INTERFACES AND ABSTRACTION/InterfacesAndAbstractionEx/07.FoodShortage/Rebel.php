<?php

class Rebel implements Buyer
{
    private const FOOD_FACTOR = 5;

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
    private $group;

    /**
     * @var int
     */
    private $food;

    /**
     * Rebel constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$name, $age, $group] = $params;
        $this->setName($name);
        $this->setAge($age);
        $this->setGroup($group);
        $this->setFood(0);
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
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    private function setGroup(string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    /**
     * @param int $food
     */
    private function setFood(int $food): void
    {
        $this->food = $food;
    }

    public function buyFood(): void
    {
        $this->setFood($this->getFood() + self::FOOD_FACTOR);
    }
}