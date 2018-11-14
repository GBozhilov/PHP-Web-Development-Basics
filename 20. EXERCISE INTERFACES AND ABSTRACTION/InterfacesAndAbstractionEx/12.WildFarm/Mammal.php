<?php

abstract class Mammal extends Animal
{
    /**
     * @var string
     */
    private $livingRegion;

    public function __construct(string $type, string $name, float $weight, string $livingRegion)
    {
        parent::__construct($type, $name, $weight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @return string
     */
    public function getLivingRegion(): string
    {
        return $this->livingRegion;
    }

    /**
     * @param string $livingRegion
     */
    private function setLivingRegion(string $livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf("%s[%s, %g, %s, %d]\n",
            $this->getType(),
            $this->getName(),
            $this->getWeight(),
            $this->getLivingRegion(),
            $this->getFoodEaten());
    }
}