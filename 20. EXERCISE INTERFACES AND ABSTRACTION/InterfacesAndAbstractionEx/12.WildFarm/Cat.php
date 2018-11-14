<?php

/**
 * Class Cat
 */
class Cat extends Felime
{
    /**
     * @var string
     */
    private $breed;

    /**
     * Cat constructor.
     * @param string $type
     * @param string $name
     * @param float $weight
     * @param string $livingRegion
     * @param string $breed
     */
    public function __construct(string $type, string $name, float $weight, string $livingRegion, string $breed)
    {
        parent::__construct($type, $name, $weight, $livingRegion);
        $this->setBreed($breed);
    }

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    private function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    public function makeSound(): void
    {
        echo "Meowwww\n";
    }

    /**
     * @param Food $food
     */
    public function eat(Food $food): void
    {
        $foodEaten = $food->getQuantity();
        $this->setFoodEaten($foodEaten);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf("%s[%s, %s, %g, %s, %d]\n",
            $this->getType(),
            $this->getName(),
            $this->getBreed(),
            $this->getWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}