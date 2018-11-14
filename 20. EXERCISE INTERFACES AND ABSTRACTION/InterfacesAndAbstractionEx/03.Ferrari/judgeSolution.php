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

/**
 * Class Ferrari
 */
class Ferrari implements Drive
{
    private const MODEL = '488-Spider/';

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
    public function setDriver(string $driver): void
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
            $this->getDriver();

        return $output;
    }
}

spl_autoload_register();

$myCar = new Ferrari(readline());

echo $myCar;