<?php

/**
 * Class Tiger
 */
class Tiger extends Felime
{
    private const FOOD_TYPE = 'Meat';

    public function makeSound(): void
    {
        echo "ROAAR!!!\n";
    }

    /**
     * @param Food $food
     * @throws Exception
     */
    public function eat(Food $food): void
    {
        $function = new ReflectionClass($food);
        $foodType = $function->getName();

        $getClassName = new ReflectionClass($this);
        $className = $getClassName->getName();

        if ($foodType != self::FOOD_TYPE) {
            throw new Exception($className . 's are not eating that type of food!');
        }

        $quantity = $food->getQuantity();
        $this->setFoodEaten($quantity);
    }
}