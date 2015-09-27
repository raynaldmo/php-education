<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/18/15
 * Time: 3:44 PM
 */

/*
 * Shared interface to store/load data to/from database
 */
interface Model {
  /*
   * Load a model
   * @param int $address_id
   */
  static function load($address_id);

  function save();
} 