<?php

/**
 * Custom Exception handler. 
 */
class ExceptionAddress extends Exception {
  /**
   * Override __toString() method
   * Magic __toString().
   * @return string 
   */
  public function __toString() {
    return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
  }
}