<?php # Department.php
namespace MyNamespace\Company;

class Department {
    private $_name;
    private $_employees;
    function __construct($name) {
        $this->_name = $name;
        $this->_employees = array();
    }
    function addEmployee(Employee $e) {
        $this->_employees[] = $e;
        echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
    }
}

