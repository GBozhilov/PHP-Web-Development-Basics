<?php

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    /**
     * Engine constructor.
     * @param $model
     * @param $power
     */
    public function __construct(string $model, float $power)
    {
        $this->setModel($model);
        $this->setPower($power);
        $this->displacement = 'n/a';
        $this->efficiency = 'n/a';
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

    /**
     * @return string
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    /**
     * @param string $displacement
     */
    public function setDisplacement(string $displacement)
    {
        $this->displacement = $displacement;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    /**
     * @param string $efficiency
     */
    public function setEfficiency(string $efficiency)
    {
        $this->efficiency = $efficiency;
    }
}

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    /**
     * Car constructor.
     * @param $model
     * @param $engine
     */
    public function __construct(string $model, Engine $engine)
    {
        $this->setModel($model);
        $this->setEngine($engine);
        $this->weight = 'n/a';
        $this->color = 'n/a';
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        $output = $this->getModel() . ':' . PHP_EOL;
        $output .= "\t" . $this->getEngine()->getModel() . ':' . PHP_EOL;
        $output .= "\t\tPower: " . $this->getEngine()->getPower() . PHP_EOL;
        $output .= "\t\tDisplacement: " . $this->getEngine()->getDisplacement() . PHP_EOL;
        $output .= "\t\tEfficiency: " . $this->getEngine()->getEfficiency() . PHP_EOL;
        $output .= "\tWeight: " . $this->getWeight() . PHP_EOL;
        $output .= "\tColor: " . $this->getColor() . PHP_EOL;

        return $output;
    }
}

$enginesCount = (int)readline();

$engines = [];
$catalogue = [];

for ($i = 0; $i < $enginesCount; $i++) {
    $engineParams = explode(' ', readline());
    $model = $engineParams[0];
    $power = (float)$engineParams[1];
    $engine = new Engine($model, $power);

    if (count($engineParams) == 3) {
        $weightOrColor = $engineParams[2];

        if (preg_match('/^\d+$/', $weightOrColor)) {
            $engine->setDisplacement($weightOrColor);
        } else {
            $engine->setEfficiency($weightOrColor);
        }
    } elseif (count($engineParams) == 4) {
        $weight = $engineParams[2];
        $efficiency = $engineParams[3];
        $engine->setDisplacement($weight);
        $engine->setEfficiency($efficiency);
    }

    $engines[$model] = $engine;
}

$carsCount = (int)readline();

for ($i = 0; $i < $carsCount; $i++) {
    $carParams = explode(' ', readline());
    $carModel = $carParams[0];
    $engineModel = $carParams[1];
    $engine = $engines[$engineModel];
    $newCar = new Car($carModel, $engine);

    if (count($carParams) == 3) {
        $weightOrColor = $carParams[2];

        if (preg_match('/^\d+$/', $weightOrColor)) {
            $newCar->setWeight($weightOrColor);
        } else {
            $newCar->setColor($weightOrColor);
        }
    } elseif (count($carParams) == 4) {
        $weight = $carParams[2];
        $color = $carParams[3];
        $newCar->setWeight($weight);
        $newCar->setColor($color);
    }

    $catalogue[] = $newCar;
}

foreach ($catalogue as $car) {
    echo $car;
}