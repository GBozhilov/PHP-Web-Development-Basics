<?php

/**
 * Class Animal
 */
abstract class Animal
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var int
     */
    private $foodEaten;

    /**
     * Animal constructor.
     * @param string $type
     * @param string $name
     * @param float $weight
     */
    protected function __construct(string $type, string $name, float $weight)
    {
        $this->setType($type);
        $this->setName($name);
        $this->setWeight($weight);
        $this->foodEaten = 0;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    private function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getFoodEaten(): int
    {
        return $this->foodEaten;
    }

    /**
     * @param int $foodEaten
     */
    public function setFoodEaten(int $foodEaten): void
    {
        $this->foodEaten += $foodEaten;
    }

    abstract public function makeSound(): void;

    abstract public function eat(Food $food): void;
}