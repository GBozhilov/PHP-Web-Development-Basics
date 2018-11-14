<?php

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