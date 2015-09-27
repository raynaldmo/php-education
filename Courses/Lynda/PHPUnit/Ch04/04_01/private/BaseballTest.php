<?php
namespace stats\Test;

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
    $this->instance = new Baseball();
    }
    //tear down method
    public function tearDown()
    {
    unset($this->instance);
    }


}