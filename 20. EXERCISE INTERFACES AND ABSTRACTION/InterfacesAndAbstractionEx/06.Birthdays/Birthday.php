<?php

/**
 * Interface Birthday
 */
interface Birthday
{
    /**
     * @param string $year
     * @return bool
     */
    public function checkBirthdayYear(string $year): bool;
}