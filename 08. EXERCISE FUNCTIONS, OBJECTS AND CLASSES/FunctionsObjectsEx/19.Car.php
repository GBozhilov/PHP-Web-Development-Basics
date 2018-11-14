<?php

class Car
{
    private $speed;
    private $fuel;
    private $economy;
    private $distance;
    private $time;

    /**
     * Car constructor.
     * @param $speed
     * @param $fuel
     * @param $economy
     */
    public function __construct(float $speed, float $fuel, float $economy)
    {
        $this->setSpeed($speed);
        $this->setFuel($fuel);
        $this->setEconomy($economy);
        $this->setTime(0);
        $this->setDistance(0);
    }

    /**
     * @return float
     */
    public function getSpeed(): float
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     */
    public function setSpeed(float $speed)
    {
        $this->speed = $speed;
    }

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
    public function setFuel(float $fuel)
    {
        $this->fuel = $fuel;
    }

    /**
     * @return float
     */
    public function getEconomy(): float
    {
        return $this->economy;
    }

    /**
     * @param float $economy
     */
    public function setEconomy(float $economy)
    {
        $this->economy = $economy;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    public function refuel($liters)
    {
        $this->setFuel($this->getFuel() + $liters);
    }

    public function printDistance()
    {
        $traveledDistance = number_format(round($this->getDistance(), 1), 1);
        echo "Total Distance: $traveledDistance" . PHP_EOL;
    }

    public function printFuel()
    {
        $fuelLeft = number_format(round($this->getFuel(), 1), 1);
        echo "Fuel left: $fuelLeft liters" . PHP_EOL;
    }

    public function printTime()
    {
        $hours = floor($this->getTime());
        $minutes = ($this->getTime() - $hours) * 60;
        echo "Total Time: $hours hours and $minutes minutes" . PHP_EOL;
    }

    public function travel($km)
    {
        $fuelPerKm = $this->getEconomy() / 100;
        $neededFuel = $km * $fuelPerKm;

        if ($this->getFuel() >= $neededFuel) {
            $this->setDistance($this->getDistance() + $km);
            $this->setFuel($this->getFuel() - $neededFuel);
            $this->setTime($this->getTime() + $km / $this->getSpeed());
        } else {
            $possibleDis = $this->getFuel() / $fuelPerKm;
            $this->setDistance($this->getDistance() + $possibleDis);
            $this->setFuel(0);
            $this->setTime($this->getTime() + $possibleDis / $this->getSpeed());
        }
    }
}

$carParams = array_map('floatval', explode(' ', readline()));

list($speed, $fuel, $economy) = $carParams;
$car = new Car($speed, $fuel, $economy);

while (true) {
    $commands = explode(' ', readline());

    if ($commands[0] == 'END') {
        break;
    } elseif ($commands[0] == 'Travel') {
        $km = (float)$commands[1];
        $car->travel($km);
    } elseif ($commands[0] == 'Refuel') {
        $liters = (float)$commands[1];
        $car->refuel($liters);
    } elseif ($commands[0] == 'Distance') {
        $car->printDistance();
    } elseif ($commands[0] == 'Time') {
        $car->printTime();
    } elseif ($commands[0] == 'Fuel') {
        $car->printFuel();
    }
}