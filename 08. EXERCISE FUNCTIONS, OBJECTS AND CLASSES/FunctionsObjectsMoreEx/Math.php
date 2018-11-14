<?php

class Math
{
    private $a;
    private $b;
    private $sum;
    private $div;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getSum(): float
    {
        $this->sum = $this->a + $this->b;
        return $this->sum;
    }

    public function getDiv(): float
    {
        if ($this->isZero($this->b)) {
            exit("Division by zero is not possible");
        }

        $this->div = $this->a / $this->b;
        return $this->div;
    }

    private function isZero($num): bool
    {
        return $num == 0;
    }
}