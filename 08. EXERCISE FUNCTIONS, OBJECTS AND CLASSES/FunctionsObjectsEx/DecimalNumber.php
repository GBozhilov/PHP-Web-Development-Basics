<?php

class DecimalNumber
{
    public $numStr;

    /**
     * DecimalNumber constructor.
     * @param $num
     */
    public function __construct(string $num)
    {
        $this->numStr = $num;
    }

    /**
     * @return string
     */
    public function getNumStr(): string
    {
        return $this->numStr;
    }

    /**
     * @param string $numStr
     */
    public function setNumStr(string $numStr)
    {
        $this->numStr = $numStr;
    }

    public function reverse(): string
    {
        $digitsArr = str_split($this->getNumStr());
        $reversed = array_reverse($digitsArr);
        return implode('', $reversed);
    }
}