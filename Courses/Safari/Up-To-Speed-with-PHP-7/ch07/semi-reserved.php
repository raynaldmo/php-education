<?php
class Investment
{
    const YIELD = 0.1;
    protected $investment;

    public function __construct($deposit)
    {
        $this->investment = $deposit;
    }

    public function return()
    {
        return $this->investment * self::YIELD;
    }
}

$deposit = 1000;
$investment = new Investment($deposit);
echo "The return on \$$deposit is $" . $investment->return();