<?php

class Demon extends Hero
{
    /**
     * @var float
     */
    private $energy;

    /**
     * Demon constructor.
     * @param string $username
     * @param float $specialPoints
     * @param int $level
     */
    public function __construct(string $username, float $specialPoints, int $level)
    {
        parent::__construct($username, $specialPoints, $level);
        $this->setEnergy($specialPoints);
        $this->setHashedPassword($username);
    }

    /**
     * @return float
     */
    public function getEnergy(): float
    {
        return $this->energy;
    }

    /**
     * @param float $energy
     */
    private function setEnergy(float $energy): void
    {
        $this->energy = $energy;
    }

    /**
     * @param string $username
     */
    private function setHashedPassword(string $username): void
    {
        $length = strlen($username);
        $this->hashedPassword = $length * 217;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $result = number_format($this->getEnergy() * $this->getLevel(), 1, '.', '');
        $output = parent::__toString() . get_class($this) . PHP_EOL;
        $output .= $result;

        return $output;
    }
}