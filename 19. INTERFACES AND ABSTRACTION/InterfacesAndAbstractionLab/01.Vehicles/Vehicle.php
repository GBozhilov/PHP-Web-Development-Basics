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

    protected $lastStatus;

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
     * @param float $distance
     * @return float
     * @throws Exception
     */
    public function drive(float $distance): float
    {
        $range = $this->getFuel() / $this->getConsumption();

        if ($distance > $range) {
            $this->lastStatus = get_class($this) . ' needs refueling' . PHP_EOL;
            return false;
        }

        $consumedFuel = $distance * $this->getConsumption();

        $this->lastStatus = get_class($this) . ' travelled ' . $distance . ' km' . PHP_EOL;
        $this->setFuel($this->getFuel() - $consumedFuel);
        return true;
    }

    /**
     * @param float $fuel
     */
    public function refuel(float $fuel): void
    {
        $this->fuel += $fuel;
        $this->lastStatus = null;
    }

    /**
     * @return mixed
     */
    abstract protected function getConsumption();

    /**
     * @return float
     */
    public function getFuel(): float
    {
        return $this->fuel;
    }

    /**
     * @param float $fuel
     */
    private function setFuel(float $fuel): void
    {
        $this->fuel = $fuel;
    }

    /**
     * @param float $consumption
     */
    private function setConsumption(float $consumption): void
    {
        $this->consumption = $consumption;
    }

    public function getLastStatus()
    {
        return $this->lastStatus;
    }
}