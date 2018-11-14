<?php

/**
 * Class Smartphone
 */
class Smartphone implements ICall, IBrowse
{
    /**
     * @param string $phoneNumber
     * @return string
     * @throws Exception
     */
    public function call(string $phoneNumber): string
    {
        if (!preg_match('/^\d+$/', $phoneNumber)) {
            throw new Exception('Invalid number!');
        }

        return "Calling... $phoneNumber" . PHP_EOL;
    }

    /**
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function browse(string $url): string
    {
        if (preg_match('/\d/', $url)) {
            throw new Exception('Invalid URL!');
        }

        return "Browsing: $url!" . PHP_EOL;
    }
}