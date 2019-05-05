<?php

class Student
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$peter = new Student('Peter', 24);
print_r($peter);