<?php

/**
 * Class Siamese
 */
class Siamese extends Cat
{
    /**
     * @var float
     */
    private $earSize;

    /**
     * Siamese constructor.
     * @param string $breed
     * @param string $name
     * @param float $earSize
     */
    public function __construct(string $breed, string $name, float $earSize)
    {
        parent::__construct($breed, $name);
        $this->setEarSize($earSize);
    }

    /**
     * @return float
     */
    public function getEarSize(): float
    {
        return $this->earSize;
    }

    /**
     * @param float $earSize
     */
    private function setEarSize(float $earSize): void
    {
        $this->earSize = $earSize;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return parent::__toString() . $this->getEarSize();
    }
}