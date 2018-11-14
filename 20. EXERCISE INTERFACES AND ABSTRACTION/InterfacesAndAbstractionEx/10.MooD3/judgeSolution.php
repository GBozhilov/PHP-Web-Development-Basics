<?php

/**
 * Class Hero
 */
abstract class Hero
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    protected $hashedPassword;

    /**
     * @var int
     */
    private $level;

    /**
     * @var float
     */
    private $specialPoints;

    /**
     * Hero constructor.
     * @param string $username
     * @param float $specialPoints
     * @param int $level
     */
    public function __construct(string $username, float $specialPoints, int $level)
    {
        $this->setUsername($username);
        $this->setLevel($level);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    private function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    private function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function __toString(): string
    {
        return "\"{$this->getUsername()}\" | \"{$this->hashedPassword}\" -> ";
    }
}

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

$params = explode(' | ', readline());
[$username, $type, $specialPoints, $level] = $params;

$newHero = new $type($username, $specialPoints, $level);

echo $newHero;