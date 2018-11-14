<?php

/**
 * Class Car
 */
class Car extends Vehicle
{
    private const  EXTRA_CONSUMPTION = 0.9;

    /**
     * @return float
     */
    protected function getConsumption(): float
    {
        return $this->consumption + self::EXTRA_CONSUMPTION;
    }
}