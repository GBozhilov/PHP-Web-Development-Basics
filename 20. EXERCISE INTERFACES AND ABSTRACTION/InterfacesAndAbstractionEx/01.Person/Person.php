<?php

/**
 * Interface Person
 */
interface Person
{
    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @param int $age
     */
    public function setAge(int $age): void;

    /**
     * @return string
     */
    public function __toString(): string;
}