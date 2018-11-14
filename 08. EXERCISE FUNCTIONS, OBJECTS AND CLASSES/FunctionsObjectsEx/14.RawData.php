<?php

class Truck
{
    private $model;
    private $engine;
    private $cargo;
    private $tires = [];

    /**
     * Truck constructor.
     * @param $model
     * @param $engine
     * @param $cargo
     * @param $tires
     */
    public function __construct(string $model, Engine $engine, Cargo $cargo, $tires)
    {
        $this->setModel($model);
        $this->setEngine($engine);
        $this->setCargo($cargo);
        $this->setTires($tires);
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
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return array
     */
    public function getTires(): array
    {
        return $this->tires;
    }

    /**
     * @param array $tires
     */
    public function setTires(array $tires)
    {
        $this->tires = $tires;
    }

    public function getTire($pressure)
    {

    }
}

class Tire
{
    private $pressure;
    private $age;

    /**
     * Tire constructor.
     * @param $pressure
     * @param $age
     */
    public function __construct(float $pressure, float $age)
    {
        $this->setPressure($pressure);
        $this->setAge($age);
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @param float $pressure
     */
    public function setPressure(float $pressure)
    {
        $this->pressure = $pressure;
    }

    /**
     * @return float
     */
    public function getAge(): float
    {
        return $this->age;
    }

    /**
     * @param float $age
     */
    public function setAge(float $age)
    {
        $this->age = $age;
    }
}

class Engine
{
    private $speed;
    private $power;

    /**
     * Engine constructor.
     * @param $speed
     * @param $power
     */
    public function __construct(float $speed, float $power)
    {
        $this->setSpeed($speed);
        $this->setPower($power);
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
    public function getPower(): float
    {
        return $this->power;
    }

    /**
     * @param float $power
     */
    public function setPower(float $power)
    {
        $this->power = $power;
    }
}

class Cargo
{
    private $weight;
    private $type;

    /**
     * Cargo constructor.
     * @param $weight
     * @param $type
     */
    public function __construct(float $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }
}

$n = (int)readline();
$trucks = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', readline());
    $model = $tokens[0];
    $engineSpeed = (float)$tokens[1];
    $enginePower = (float)$tokens[2];
    $cargoWeight = (float)$tokens[3];
    $cargoType = $tokens[4];
    $tire1Pressure = (float)$tokens[5];
    $tire1Age = (float)$tokens[6];
    $tire2Pressure = (float)$tokens[7];
    $tire2Age = (float)$tokens[8];
    $tire3Pressure = (float)$tokens[9];
    $tire3Age = (float)$tokens[10];
    $tire4Pressure = (float)$tokens[11];
    $tire4Age = (float)$tokens[12];

    $engine = new Engine($engineSpeed, $enginePower);
    $cargo = new Cargo($cargoWeight, $cargoType);
    $tires = [
        new Tire($tire1Pressure, $tire1Age),
        new Tire($tire2Pressure, $tire2Age),
        new Tire($tire3Pressure, $tire3Age),
        new Tire($tire4Pressure, $tire4Age)
    ];

    $truck = new Truck($model, $engine, $cargo, $tires);
    array_push($trucks, $truck);
}

$command = readline();
$command === 'fragile' ? fragile($trucks) : flamable($trucks);

function fragile($trucks)
{
    $filteredTrucks = array_filter($trucks, function (Truck $truck) {
        $hasLowPressure = false;

        foreach ($truck->getTires() as $tire) {
            if ($tire->getPressure() < 1) {
                $hasLowPressure = true;
                break;
            }
        }

        return $truck->getCargo()->getType() === 'fragile' && $hasLowPressure;
    });

    printResult($filteredTrucks);
}

function flamable($trucks)
{
    $filteredTrucks = array_filter($trucks, function (Truck $truck) {
        return $truck->getCargo()->getType() === 'flamable' &&
            $truck->getEngine()->getPower() > 250;
    });

    printResult($filteredTrucks);
}

function printResult($trucks)
{
    $count = count($trucks);
    foreach ($trucks as $truck) {
        echo $truck->getModel();
        if ($count > 1) {
            echo PHP_EOL;
        }
        $count--;
    }
}