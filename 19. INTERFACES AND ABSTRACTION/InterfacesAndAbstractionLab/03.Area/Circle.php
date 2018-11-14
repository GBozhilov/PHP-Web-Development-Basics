<?php

/**
 * Class Circle
 */
class Circle implements Area, Circumference
{
    /**
     * @var float
     */
    private $radius;

    /**
     * Circle constructor.
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    /**
     * @param float $radius
     */
    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function getSurface(): float
    {
        return M_PI * $this->radius ** 2;
    }

    public function getCircumference(): float
    {
        return 2 * M_PI * $this->radius;
    }
}