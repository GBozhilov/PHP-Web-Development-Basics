<?php

/**
 * Class Mouse
 */
class Mouse extends Mammal
{
    private const FOOD_TYPE = 'Vegetable';

    public function makeSound(): void
    {
        echo "SQUEEEAAAK!\n";
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $foodType = get_class($food);
        $className = get_class($this);

        if ($foodType != self::FOOD_TYPE) {
            throw new Exception($className . 's are not eating that type of food!');
        }

        $quantity = $food->getQuantity();
        $this->setFoodEaten($quantity);
    }
}