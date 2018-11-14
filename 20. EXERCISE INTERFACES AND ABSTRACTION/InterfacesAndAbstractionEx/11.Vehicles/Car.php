<?php

/**
 * Class Car
 */
class Car extends Vehicle
{
    private const CONSUMPTION_FACTOR = 0.9;

    /**
     * @param float $consumption
     */
    protected function setConsumption(float $consumption): void
    {
        $this->consumption = $consumption + self::CONSUMPTION_FACTOR;
    }

    /**
     * @param float $fuel
     */
    protected function setFuel(float $fuel): void
    {
        $this->fuel = $fuel;
    }

    /**
     * @param float $liters
     */
    public function refuel(float $liters): void
    {
        $this->setFuel($this->getFuel() + $liters);
    }
}