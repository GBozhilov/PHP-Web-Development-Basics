<?php

class Person
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo $this->name . ' ' . $this->age;
    }
}

$person = new Person(readline(), (int)readline());