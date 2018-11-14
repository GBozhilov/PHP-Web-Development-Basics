<?php

class Car
{
    private $model;
    private $fuelAmount;
    private $fuelPrice;
    private $distance = 0;

    /**
     * Car constructor.
     * @param $model
     * @param $fuelAmount
     * @param $fuelPrice
     */
    public function __construct(string $model, float $fuelAmount, float $fuelPrice)
    {
        $this->setModel($model);
        $this->setFuelAmount($fuelAmount);
        $this->setFuelPrice($fuelPrice);
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    /**
     * @param float $fuelAmount
     */
    public function setFuelAmount(float $fuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelPrice(): float
    {
        return $this->fuelPrice;
    }

    /**
     * @param float $fuelPrice
     */
    public function setFuelPrice(float $fuelPrice)
    {
        $this->fuelPrice = $fuelPrice;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance(int $distance)
    {
        $this->distance = $distance;
    }

    public function drive(float $amountOfKm)
    {
        $neededFuelPrice = $amountOfKm * $this->getFuelPrice();

        if ($this->getFuelAmount() >= $neededFuelPrice) {
            $this->setFuelAmount($this->getFuelAmount() - $neededFuelPrice);
            $this->setDistance($this->getDistance() + $amountOfKm);
        } else {
            echo 'Insufficient fuel for the drive' . PHP_EOL;
        }
    }

    public function __toString()
    {
        $formattedFuel = number_format($this->getFuelAmount(), 2);
        $carParams = [$this->getModel(), $formattedFuel, $this->getDistance()];
        return implode(' ', $carParams);
    }
}