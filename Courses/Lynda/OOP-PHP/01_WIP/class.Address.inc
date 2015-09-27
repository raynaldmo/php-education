<?php

/*
 * Physical address
 */
abstract class Address implements Model {

  const ADDRESS_TYPE_RESIDENCE = 1;
  const ADDRESS_TYPE_BUSINESS = 2;
  const ADDRESS_TYPE_PARK = 3;

  public static $valid_address_types = array(
    Address::ADDRESS_TYPE_RESIDENCE => 'Residence',
    Address::ADDRESS_TYPE_BUSINESS => 'Business',
    Address::ADDRESS_TYPE_PARK => 'Park'
  );

  // Primary key of an Address
  protected  $_address_id;

  // Address type id
  protected $_address_type_id;

  // Postal code.
  protected  $_postal_code;

  // When the record was created and last updated
  protected $_time_created;
  protected $_time_updated;

  // Street address
  public $street_address_1;
  public $street_address_2;

  // Name of the City
  public $city_name;

  // Name of the subdivision
  public $subdivision_name;

  // Name of the Country
  public $country_name;

  private $protected_fields = array('address_id', 'address_type_id',
    'postal_code', 'time_created', 'time_updated');


  /*
   * Force extending classes to implement init method
   */
  abstract protected function _init();

  /*
   * Post clone behavior
   */
  function __clone() {
    $this->_time_created = time();
    $this->_time_updated = null;
  }

  /*
   * Constructor
   * @param array $data optional array of property names
   */
  function __construct($data = array()) {
    $this->_init(); // implemented in child classes
    $this->_time_created = time();


    // Ensure that the Address can be populated
    if (!is_array($data)) {
      trigger_error('Unable to construct address with a ' . gettype($data));
    }

    // If there is at least one value, populate the Address with it.
    if (count($data) > 0) {
      $saved_keys = array();

      foreach ($data as $key => $value) {
        // Special case for protected properties
        if (in_array($key, $this->protected_fields)) {
          $key = '_' . $key;
        }
        $saved_keys[] = $key;

        $this->$key = $value;
      }
      trigger_error('saved keys: ' . var_export($saved_keys), E_USER_NOTICE);
    }
  }

  /*
   * Magic __get.
   * @param string $name
   * @return mixed
   */
  function __get($name) {
    // Postal code lookup if unset
    if (!$this->_postal_code) {
      $this->_postal_code = $this->_postal_code_guess();
    }

    // Attempt to return a protected property
    $protected_property_name = '_' . $name;
    if (property_exists($this, $protected_property_name)) {
      return $this->$protected_property_name;
    }

    // Unable to access property
    trigger_error('Undefined property via __get: '. $name);
    return null;
  }

  function __set($name, $value) {
    $this->$name = $value;

    // Unable to access property; trigger error
    trigger_error('Undefined or un-allowed property via __set(): ' . $name);
  }

  /*
   * Magic __toString()
   * @return string
   */
  function __toString() {
    return $this->display();
  }

  /*
   * Guess the postal code given the subdivision and city name
   * @return string
   */
  protected function _postal_code_guess() {
    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    $city_name = $mysqli->real_escape_string($this->city_name);
    $sub_name = $mysqli->real_escape_string($this->subdivision_name);

    $query = sprintf('SELECT postal_code FROM location ' .
      'WHERE city_name = "%s" AND subdivision_name = "%s"',
      $city_name, $sub_name);

    $res = $mysqli->query($query);
    if (!$res) {
      trigger_error('SQL query failed :' . $query, E_USER_ERROR);
      return null;
    }
    if ($row = $res->fetch_assoc()) {
        return $row['postal_code'];
    }
    return null;
  }

  /*
   * Display an address in HTML
   * @return string
    */
  function display() {
    $output = '';

    // Street address
    $output .= $this->street_address_1;
    if ($this->street_address_2) {
      $output .= '<br>' . $this->street_address_2;
    }

    // City, Subdivision, Postal
    $output .= '<br>';
    $output .= $this->city_name . ', ' . $this->subdivision_name;
    $output .= ' ' . $this->postal_code;

    // Country
    $output .= '<br>';
    $output .= $this->country_name;

    return $output;
  }

  /*
   * Determines if an address type is valid
   * @param int $address_type
   * @return boolean
   */
   public static function isValidAddressTypeId($address_type_id) {
     return array_key_exists($address_type_id, self::$valid_address_types);
   }

  /*
   * If valid, set the address type id
   * @param int $address_type_id
   */
    protected function _setAddressTypeId($address_type_id) {
      if (self::isValidAddressTypeId($address_type_id)) {
        $this->_address_type_id = $address_type_id;
      }
    }

  /**
   * Given an address_type_id, return an instance of that subclass.
   * @param int $address_type_id
   * @param array $data
   * @return Address subclass
   */
  final public static function getInstance($address_type_id, $data = array()) {
    $class_name = 'Address' . self::$valid_address_types[$address_type_id];
    return new $class_name($data);
  }

  /**
   * Load an Address. Uses Model interface
   * @param int $address_id
   */
  final public static function load($address_id) {
    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    $sql_query  = 'SELECT address.* ';
    $sql_query .= 'FROM address ';
    $sql_query .= 'WHERE address_id = "' . (int) $address_id . '" ';

    $result = $mysqli->query($sql_query);
    if ($row = $result->fetch_assoc()) {

      trigger_error('load: ' . var_export($row), E_USER_NOTICE);

      return self::getInstance($row['address_type_id'], $row);
    }
    throw new Exception('Address not found.');
  }

  /**
   * Save an Address.
   */
  final public function save() {
    // save for first time
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query = '';

    if ($this->_address_id) {
      // update
    } else {

      $query = sprintf('INSERT INTO address ' .
        '(address_type_id,time_created,time_updated,street_address_1,
        street_address_2,city_name,subdivision_name,postal_code,
        country_name) '.
        'values(%d,%d,%d,"%s","%s","%s","%s","%s","%s")',
        $this->_address_type_id, $this->_time_created, $this->_time_created,
        $this->street_address_1, $this->street_address_2, $this->city_name,
        $this->subdivision_name, $this->_postal_code, $this->country_name
      );
    }

    trigger_error('save address: ' . $query, E_USER_NOTICE);

    $res = $mysqli->query($query);
    if (!$res) {
      trigger_error('save address failed: ' . $mysqli->error, E_USER_ERROR);
    }
  }

}
