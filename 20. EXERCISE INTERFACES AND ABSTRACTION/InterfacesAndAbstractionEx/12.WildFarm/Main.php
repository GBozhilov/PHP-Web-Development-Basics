<?php

spl_autoload_register();

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