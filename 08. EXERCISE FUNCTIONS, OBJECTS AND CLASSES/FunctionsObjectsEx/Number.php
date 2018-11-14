<?php

class Number
{
    public $num;
    public $digitNames = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine'
    ];

    /**
     * Number constructor.
     * @param $num
     */
    public function __construct($num)
    {
        $this->setNum($num);
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * @return array
     */
    public function getDigitNames(): array
    {
        return $this->digitNames;
    }

    public function getNameOfLastDigit()
    {
        $lastDigit = $this->getNum() % 10;
        return $this->getDigitNames()[$lastDigit];
    }
}