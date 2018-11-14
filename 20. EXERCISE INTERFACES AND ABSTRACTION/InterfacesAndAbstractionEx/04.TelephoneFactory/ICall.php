<?php

/**
 * Interface ICall
 */
interface ICall
{
    /**
     * @param string $phoneNumber
     * @return string
     */
    public function call(string $phoneNumber): string;
}