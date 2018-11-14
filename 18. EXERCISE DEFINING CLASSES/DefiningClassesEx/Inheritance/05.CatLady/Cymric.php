<?php

/**
 * Class Cymric
 */
class Cymric extends Cat
{
    /**
     * @var float
     */
    private $furLength;

    /**
     * Cymric constructor.
     * @param string $breed
     * @param string $name
     * @param float $furLength
     */
    public function __construct(string $breed, string $name, float $furLength)
    {
        parent:: __construct($breed, $name);
        $this->setFurLength($furLength);
    }

    /**
     * @return float
     */
    public function getFurLength(): float
    {
        return $this->furLength;
    }

    /**
     * @param float $furLength
     */
    private function setFurLength(float $furLength): void
    {
        $this->furLength = $furLength;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return parent:: __toString() . $this->getFurLength();
    }
}