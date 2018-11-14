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
        $this->fuel = $fuel;
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

$vehiclesCount = 2;
$vehicles = [];

for ($i = 0; $i < $vehiclesCount; $i++) {
    [$type, $fuel, $consumption] = explode(' ', readline());

    if (!class_exists($type)) {
        throw new Exception('Non existing type!');
    }

    $vehicles[$type] = new $type($fuel, $consumption);
}

$commandsCount = (int)readline();

for ($i = 0; $i < $commandsCount; $i++) {
    [$action, $type, $disOrLiters] = explode(' ', readline());
    $action = strtolower($action);

    try {
        $vehicles[$type]->$action($disOrLiters);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

foreach ($vehicles as $vehicle) {
    echo $vehicle;
}