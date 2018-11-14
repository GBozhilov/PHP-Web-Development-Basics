<?php

class Truck extends Vehicle
{
    private const CONSUMPTION_FACTOR = 1.6;
    private const TANK_FACTOR = 0.95;

    protected function setConsumption(float $consumption): void
    {
        $this->consumption = $consumption + self::CONSUMPTION_FACTOR;
    }

    protected function setFuel(float $fuel): void
    {
        $this->fuel = self::TANK_FACTOR * $fuel;
    }

    /**
     * @param float $liters
     */
    public function refuel(float $liters): void
    {
        $currentFuel = $this->getFuel();
        $this->setFuel($liters);
        $this->fuel += $currentFuel;
    }
}