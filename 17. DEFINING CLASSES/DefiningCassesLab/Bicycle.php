<?php

class Bicycle extends Vehicle
{
    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $model;

    /**
     * @var int
     */
    private $year;

    /**
     * @var bool
     */
    private $forSkirt;

    /**
     * @var bool
     */
    private $isRide;

    /**
     * Bicycle constructor.
     * @param string $brand
     * @param string $model
     * @param int $year
     * @param bool $forSkirt
     */
    public function __construct(string $brand, string $model, int $year, bool $forSkirt = null)
    {
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setYear($year);
        $this->setForSkirt($forSkirt);
        $this->setIsRide(false);
        parent::__construct(0, null);
    }

    /**
     * @return bool
     */
    public function isForSkirt(): bool
    {
        return $this->forSkirt;
    }

    /**
     * @param bool $forSkirt
     */
    public function setForSkirt(bool $forSkirt): void
    {
        $this->forSkirt = $forSkirt;
    }

    /**
     * @return bool
     */
    public function isRide(): bool
    {
        return $this->isRide;
    }

    /**
     * @param bool $isRide
     */
    public function setIsRide(bool $isRide): void
    {
        $this->isRide = $isRide;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
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
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function ride(): void {
        $this->setIsRide(true);
    }

    public function stop(): void {
        $this->setIsRide(false);
    }
}