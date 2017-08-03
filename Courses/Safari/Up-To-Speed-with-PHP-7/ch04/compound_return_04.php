<?php
require_once './HolidayInterface.php';

// See notes in file compount_return_03.php

class Holidays implements HolidayInterface
{
    protected $date;

    public function __construct($year = null)
    {
        $y = $year ?? date('Y');
        $this->date = new DateTimeImmutable("January 1, $y");
    }

    public function getMemorial() : DateTimeImmutable
    {
        return $this->date->modify('last Monday of May');
    }

    public function getThanksgiving() : DateTimeImmutable
    {
        return $this->date->modify('fourth Thursday of November');
    }
}


$holidays = new Holidays(2017);
$memorial = $holidays->getMemorial();
echo $memorial->format('l, F j, Y') . '<br>';

$thanksgiving = $holidays->getThanksgiving();
echo $thanksgiving->format('l, F j, Y') . '<br>';

$blackFriday = $thanksgiving->modify('+1 day');
echo $blackFriday->format('l, F j, Y') . '<br>';