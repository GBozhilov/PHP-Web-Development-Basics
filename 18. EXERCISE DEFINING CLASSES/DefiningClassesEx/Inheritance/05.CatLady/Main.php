<?php

spl_autoload_register();

/**
 * Class Main
 */
class Main
{
    /**
     * @var Cat[]
     */
    private $cats;

    /**
     * Main constructor.
     */
    public function __construct()
    {
        $this->cats = [];
    }

    public function run(): void
    {
        $this->readData();
    }

    public function readData(): void
    {
        while ('End' !== $line = readline()) {
            $data = explode(' ', $line);
            $cat = Factory::createCat($data);
            $name = $data[1];
            $this->cats[$name] = $cat;
        }

        $searchedName = readline();

        $this->printCat($searchedName);
    }

    /**
     * @param $searchedName
     * @throws Exception
     */
    public function printCat($searchedName): void
    {
        if (!array_key_exists($searchedName, $this->cats)) {
            throw new Exception('Invalid cat name');
        }

        echo $this->cats[$searchedName];
    }
}

$main = new Main();
$main->run();