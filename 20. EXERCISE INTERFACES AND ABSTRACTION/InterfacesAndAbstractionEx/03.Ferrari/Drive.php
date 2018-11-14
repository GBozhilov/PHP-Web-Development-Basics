<?php

/**
 * Interface Drive
 */
interface Drive
{
    /**
     * @return string
     */
    public function stop(): string;

    /**
     * @return string
     */
    public function increaseSpeed(): string;

    /**
     * @return string
     */
    public function __toString(): string;
}