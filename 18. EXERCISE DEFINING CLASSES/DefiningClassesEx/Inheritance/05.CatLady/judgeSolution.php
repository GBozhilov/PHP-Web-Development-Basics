<?php

/**
 * Class Cat
 */
abstract class Cat
{
    /**
     * @var string
     */
    private $breed;

    /**
     * @var string
     */
    private $name;

    /**
     * Cat constructor.
     * @param string $name
     * @param string $breed
     */
    protected function __construct(string $breed, string $name)
    {
        $this->setBreed($breed);
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    private function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->getBreed()} {$this->getName()} ";
    }
}

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

$cats = [];

while ('End' !== $line = readline()) {
    [$breed, $name, $item] = explode(' ', $line);

    $cats[$name] = new $breed($breed, $name, $item);
}

$name = readline();

echo $cats[$name];