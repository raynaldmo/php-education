<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/18/15
 * Time: 12:18 PM
 */

class AddressResidence extends Address{
  protected  function _init() {
    $this->_setAddressTypeId(Address::ADDRESS_TYPE_RESIDENCE);
  }
} 