<?php
declare(strict_types=1);

class Person
{
    public $name;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello()
    {
        echo "$this->name says \"Hello\"!";
    }
}

$person = new Person(readline());

$fields = count(get_class_vars($person));
$methods = count(get_class_methods($person));

if ($fields != 1 or $methods != 1) {
    throw new Exception('Too many fields or methods');
}