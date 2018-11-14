<?php

class Child extends Person
{
    /**
     * Child constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age);
    }

    /**
     * @param int $age
     * @throws Exception
     */
    protected function setAge(int $age): void
    {
        if ($age >= 16) {
            throw new Exception('Child’s age must be less than 16!');
        }

        parent::setAge($age);
    }
}