<?php

class Model
{
    public $model;
    public $engine;
    public $numberOfSeats;
    public $horsepower;

    /**
     * Model constructor.
     * @param $model
     * @param $engine
     * @param $numberOfSeats
     * @param $horsepower
     */
    public function __construct(string $model, string $engine, string $numberOfSeats, string $horsepower)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->numberOfSeats = $numberOfSeats;
        $this->horsepower = $horsepower;
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
     * @return string
     */
    public function getEngine(): string
    {
        return $this->engine;
    }

    /**
     * @param string $engine
     */
    public function setEngine(string $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return string
     */
    public function getNumberOfSeats(): string
    {
        return $this->numberOfSeats;
    }

    /**
     * @param string $numberOfSeats
     */
    public function setNumberOfSeats(string $numberOfSeats)
    {
        $this->numberOfSeats = $numberOfSeats;
    }

    /**
     * @return string
     */
    public function getHorsepower(): string
    {
        return $this->horsepower;
    }

    /**
     * @param string $horsepower
     */
    public function setHorsepower(string $horsepower)
    {
        $this->horsepower = $horsepower;
    }
}