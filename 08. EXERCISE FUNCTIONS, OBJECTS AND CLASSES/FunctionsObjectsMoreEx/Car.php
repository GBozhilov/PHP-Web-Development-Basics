<?php

class Car
{
    public $brand;
    public $model;
    public $year;

    public function __construct($brand, $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function setYear(int $year)
    {
        if ($year < 1886 || $year > 2018) {
            throw new Error('Invalid year!');
        }
        $this->year = $year;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }
}