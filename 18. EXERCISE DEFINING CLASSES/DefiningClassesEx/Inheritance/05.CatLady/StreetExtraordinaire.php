<?php

/**
 * Class StreetExtraordinaire
 */
class StreetExtraordinaire extends Cat
{
    /**
     * @var float
     */
    private $decibelsOfMeows;

    /**
     * StreetExtraordinaire constructor.
     * @param string $breed
     * @param string $name
     * @param float $decibelsOfMeows
     */
    public function __construct(string $breed, string $name, float $decibelsOfMeows)
    {
        parent::__construct($breed, $name);
        $this->setDecibelsOfMeows($decibelsOfMeows);
    }

    /**
     * @return float
     */
    public function getDecibelsOfMeows(): float
    {
        return $this->decibelsOfMeows;
    }

    /**
     * @param float $decibelsOfMeows
     */
    private function setDecibelsOfMeows(float $decibelsOfMeows): void
    {
        $this->decibelsOfMeows = $decibelsOfMeows;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return parent::__toString() . $this->getDecibelsOfMeows();
    }
}