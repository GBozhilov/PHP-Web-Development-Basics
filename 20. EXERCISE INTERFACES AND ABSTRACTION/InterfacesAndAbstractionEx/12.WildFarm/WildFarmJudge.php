<?php

/**
 * Class AnimalFactory
 */
class AnimalFactory
{
    public static function createAnimal(array $data): Animal
    {
        [$type, $name, $weight, $livingRegion] = $data;

        if (!class_exists($type)) {
            throw new Exception('Invalid animal');
        }

        if ($type == 'Cat') {
            $breed = $data[4];

            return new Cat($type, $name, $weight, $livingRegion, $breed);
        }

        return new $type($type, $name, $weight, $livingRegion);
    }
}

/**
 * Class FoodFactory
 */
class FoodFactory
{
    /**
     * @param array $data
     * @return Food
     * @throws Exception
     */
    public static function createFood(array $data): Food
    {
        [$type, $quantity] = $data;

        if (!class_exists($type)) {
            throw new Exception('Invalid food type');
        }

        return new $type($quantity);
    }
}

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

abstract class Mammal extends Animal
{
    /**
     * @var string
     */
    private $livingRegion;

    public function __construct(string $type, string $name, float $weight, string $livingRegion)
    {
        parent::__construct($type, $name, $weight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @return string
     */
    public function getLivingRegion(): string
    {
        return $this->livingRegion;
    }

    /**
     * @param string $livingRegion
     */
    private function setLivingRegion(string $livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf("%s[%s, %g, %s, %d]\n",
            $this->getType(),
            $this->getName(),
            $this->getWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}

/**
 * Class Felime
 */
abstract class Felime extends Mammal
{

}

abstract class Food
{
    /**
     * @var int
     */
    private $quantity;

    /**
     * Food constructor.
     * @param int $quantity
     */
    public function __construct($quantity)
    {
        $this->setQuantity($quantity);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    private function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}

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

/**
 * Class Zebra
 */
class Zebra extends Mammal
{
    private const FOOD_TYPE = 'Vegetable';

    public function makeSound(): void
    {
        echo 'Zs' . PHP_EOL;
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

/**
 * Class Vegetable
 */
class Vegetable extends Food
{

}

/**
 * Class Meat
 */
class Meat extends Food
{

}

/**
 * Class Main
 */
class Main
{
    private const END = 'End';

    public function readData(): void
    {
        $input = readline();

        while ($input != self::END) {
            $animalData = explode(' ', $input);
            $foodData = explode(' ', readline());

            $animal = AnimalFactory::createAnimal($animalData);
            $food = FoodFactory::createFood($foodData);

            $animal->makeSound();

            try {
                $animal->eat($food);
            } catch (Exception $ex) {
                echo $ex->getMessage() . PHP_EOL;
            }
            echo $animal;

            $input = readline();
        }
    }
}

$main = new Main();
$main->readData();