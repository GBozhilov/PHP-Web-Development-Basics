<?php

/**
 * Class Ferrari
 */
class Ferrari implements Drive
{
    private const MODEL = '488-Spider/';

    /**
     * @var int
     */
    private static $objNum = 0;

    /**
     * @var string
     */
    private $driver;

    /**
     * Ferrari constructor.
     * @param string $driver
     */
    public function __construct(string $driver)
    {
        $this->setDriver($driver);
        self::$objNum++;
    }

    private static function forUrl(string $str, string $rep = '-'): string
    {
        return strtolower(str_replace(' ', $rep, $str));
    }

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     */
    private function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }

    /**
     * @return string
     */
    public function stop(): string
    {
        return 'Brakes!/';
    }

    /**
     * @return string
     */
    public function increaseSpeed(): string
    {
        return 'Zadu6avam sA!/';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $output = self::MODEL .
            $this->stop() .
            $this->increaseSpeed() .
            self::forUrl($this->getDriver()) . '/' .
            ' inst. ' . self::$objNum . PHP_EOL;

        return $output;
    }
}