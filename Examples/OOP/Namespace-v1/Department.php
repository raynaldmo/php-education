<?php # Department.php
# If not using a class file autoloader,
# namespace can be called anything you want and doesn't have to match
# directory structure of this class file
namespace Foo\Company;

class Department {
    private $_name;
    private $_employees;
    function __construct($name) {
        $this->_name = $name;
        $this->_employees = array();
    }
    public function addEmployee(Employee $e) {
        $this->_employees[] = $e;
        echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
    }
}

