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