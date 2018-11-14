<?php

class Student
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$peter = new Student('Peter');
print_r($peter);