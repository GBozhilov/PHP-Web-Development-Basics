<?php

/**
 * Interface IBrowse
 */
interface IBrowse
{
    /**
     * @param string $url
     * @return string
     */
    public function browse(string $url): string;
}