<?php

class Person
{
    public $name = 'Peter';
    public $age = 23;
}

$person = new Person();
print_r(count(get_object_vars($person)));