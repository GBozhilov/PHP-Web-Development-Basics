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

$phoneNumbers = explode(' ', readline());
$sites = explode(' ', readline());

foreach ($phoneNumbers as $phone) {
    try {
        $smartphone = new Smartphone();
        echo $smartphone->call($phone);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

foreach ($sites as $url) {
    try {
        $smartphone = new Smartphone();
        echo $smartphone->browse($url);
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}