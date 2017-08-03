<?php
require_once './HolidayInterface.php';

// Example showing that methods in class implementing inferface must
// specify return type.

class Holidays implements HolidayInterface
{
    protected $date;

    public function __construct($year = null)
    {
        $y = $year ?? date('Y');
        $this->date = new DateTimeImmutable("January 1, $y");
    }

    // getMemorial must specify return type since interface definition
    // specifies return type.
    public function getMemorial()
    {
        return $this->date->modify('last Monday of May');
    }

    public function getThanksgiving()
    {
        return $this->date->modify('fourth Thursday of November');
    }
}


$holidays = new Holidays();
$memorial = $holidays->getMemorial();
echo $memorial->format('l, F j, Y') . '<br>';

$thanksgiving = $holidays->getThanksgiving();
echo $thanksgiving->format('l, F j, Y') . '<br>';

$blackFriday = $thanksgiving->modify('+1 day');
echo $blackFriday->format('l, F j, Y') . '<br>';