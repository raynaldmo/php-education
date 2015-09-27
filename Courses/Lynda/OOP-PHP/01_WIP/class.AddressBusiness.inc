<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/18/15
 * Time: 12:19 PM
 */

class AddressBusiness extends Address {
  protected  function _init() {
    $this->_setAddressTypeId(Address::ADDRESS_TYPE_BUSINESS);
  }
} 