<?php

/**
 * Class Truck
 */
class Truck extends Vehicle
{
    private const  EXTRA_CONSUMPTION = 1.6;
    private const  FUEL_FACTOR = 0.95;

    /**
     * @return float
     */
    protected function getConsumption(): float
    {
        return $this->consumption + self::EXTRA_CONSUMPTION;
    }
}