<?php

class Archangel extends Hero
{
    /**
     * @var int
     */
    private $mana;

    /**
     * Archangel constructor.
     * @param string $username
     * @param float $specialPoints
     * @param int $level
     */
    public function __construct(string $username, float $specialPoints, int $level)
    {
        parent::__construct($username, $specialPoints, $level);
        $this->setMana($specialPoints);
        $this->setHashedPassword($username);
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    public function setMana(int $mana): void
    {
        $this->mana = $mana;
    }

    /**
     * @param string $username
     */
    private function setHashedPassword(string $username): void
    {
        $length = strlen($username);
        $this->hashedPassword = strrev($username) . ($length * 21);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $output = parent::__toString() . get_class($this) . PHP_EOL;
        $output .= $this->getMana() * $this->getLevel();

        return $output;
    }
}