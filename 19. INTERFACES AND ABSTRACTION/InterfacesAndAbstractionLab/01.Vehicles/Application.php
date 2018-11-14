<?php

/**
 * Class Application
 */
class Application
{
    /**
     * @var Vehicle[]
     */
    private $vehicles = [];

    /**
     * @throws Exception
     */
    public function readData(): void
    {
        while ('END' !== $line = readline('Enter Vehicle: ')) {
            [$type, $fuel, $consumption] = explode(' ', $line);

            if (!class_exists($type)) {
                throw new Exception('Invalid Type Vehicle!');
            }

            $this->vehicles[$type] = new $type($fuel, $consumption);
        }
    }

    public function printData(): void
    {
        $n = (int)readline();

        for ($i = 0; $i < $n; $i++) {
            [$operation, $type, $data] = explode(' ', readline());

            if (!isset($this->vehicles[$type])) {
                throw new Exception('Invalid Type Vehicle!');
            }

            $operation = strtolower($operation);

            if (!is_callable([$this->vehicles[$type], $operation])) {
                throw new Exception('Invalid Operation!');
            }

            $this->vehicles[$type]->$operation($data);
            echo $this->vehicles[$type]->getLastStatus();
        }
    }

    public function printFinal(): void
    {
        foreach ($this->vehicles as $type => $vehicle) {
            $formattedFuel = number_format($vehicle->getFuel(), 2, '.', '');
            echo $type . ' ' . $formattedFuel . PHP_EOL;
        }
    }
}