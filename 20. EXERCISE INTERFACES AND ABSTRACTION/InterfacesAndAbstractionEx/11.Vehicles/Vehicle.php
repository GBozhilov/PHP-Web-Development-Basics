<?php

/**
 * Class Vehicle
 */
abstract class Vehicle
{
    /**
     * @var float
     */
    protected $fuel;

    /**
     * @var float
     */
    protected $consumption;

    /**
     * Vehicle constructor.
     * @param float $fuel
     * @param float $consumption
     */
    public function __construct(float $fuel, float $consumption)
    {
        $this->setFuel($fuel);
        $this->setConsumption($consumption);
    }

    /**
     * @param float $liters
     */
    abstract public function refuel(float $liters): void;

    /**
     * @param float $consumption
     */
    abstract protected function setConsumption(float $consumption): void;

    /**
     * @param float $fuel
     */
    abstract protected function setFuel(float $fuel): void;

    /**
     * @param float $distance
     * @throws Exception
     */
    public function drive(float $distance): void
    {
        $neededFuel = $distance * $this->getConsumption();
        $type = get_class($this);

        if ($this->getFuel() < $neededFuel) {
            throw new Exception("$type needs refueling");
        }

        $this->fuel -= $neededFuel;
        echo "$type travelled $distance km" . PHP_EOL;
    }

    /**
     * @return float
     */
    public function getFuel(): float
    {
        return $this->fuel;
    }

    /**
     * @return float
     */
    public function getConsumption(): float
    {
        return $this->consumption;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $formattedFuel = number_format($this->getFuel(), 2, '.', '');
        return get_class($this) . ': ' . $formattedFuel . PHP_EOL;
    }
}