<?php

/**
 * Interface Identity
 */
interface Identity
{
    /**
     * @param string $needle
     * @return bool
     */
    public function hasFakeId(string $needle): bool;
}