<?php

/**
 * Interface TouchScreen
 */
interface TouchScreen
{
    /**
     * @return mixed
     */
    public function moveFinger();

    /**
     * @return mixed
     */
    public function clickFinger();

    /**
     * @return mixed
     */
    public function writeText();
}