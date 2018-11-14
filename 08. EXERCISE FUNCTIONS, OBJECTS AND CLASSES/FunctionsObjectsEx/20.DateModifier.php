<?php

class DateModifier
{
    private $days;

    public function __construct($str1, $str2)
    {
        $this->createDates($str1, $str2);
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    public function createDates($str1, $str2)
    {
        $date1 = new DateTime(str_replace(' ', '-', $str1));
        $date2 = new DateTime(str_replace(' ', '-', $str2));
        $this->calcDiff($date1, $date2);
    }

    public function calcDiff(DateTime $date1, DateTime $date2)
    {
        $interval = $date1->diff($date2);
        $this->setDays($interval->format('%a'));
    }

    public function __toString()
    {
        return $this->getDays();
    }
}

$dateModifier = new DateModifier(readline(), readline());
echo $dateModifier;