<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/18/15
 * Time: 12:21 PM
 */

class AddressPark extends Address {

  // Example of property override
  public $country_name = 'Australia';

  // Override parent display() method
  public function display() {
    $output = '<div style="background-color:lightblue;width:50%;padding:5px;
    ">';
    $output .= parent::display();
    $output .= '</div>';

    return $output;
  }

  protected  function _init() {
    $this->_setAddressTypeId(Address::ADDRESS_TYPE_PARK);
  }
} 