<?php

class Vehicle
{
    /**
     * @var int
     */
    private $numberOfDoors;

    /**
     * @var string
     */
    protected $color;

    /**
     * Vehicle constructor.
     * @param int $numberOfDoors
     * @param $color
     */
    public function __construct(int $numberOfDoors, $color)
    {
        $this->setNumberOfDoors($numberOfDoors);
        $this->setColor($color);
    }

    /**
     * @return int
     */
    public function getNumberOfDoors(): int
    {
        return $this->numberOfDoors;
    }

    /**
     * @param int $numberOfDoors
     */
    protected function setNumberOfDoors(int $numberOfDoors): void
    {
        $this->numberOfDoors = $numberOfDoors;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function __get($name)
    {
        return "Property $name does not exists";
    }

    /**
     * @param string $newColor
     */
    public function paint($newColor): void
    {
        $this->setColor($newColor);
    }
}