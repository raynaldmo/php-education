<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/23/15
 * Time: 8:43 AM
 */

function classData( ReflectionClass $class ) {
  $details = "";
  $name = $class->getName();
  if ( $class->isUserDefined() ) {
    $details .= "$name is user defined\n";
  }
  if ( $class->isInternal() ) {
    $details .= "$name is built-in\n";
  }
  if ( $class->isInterface() ) {
    $details .= "$name is interface\n";
  }
  if ( $class->isAbstract() ) {
    $details .= "$name is an abstract class\n";
  }
  if ( $class->isFinal() ) {
    $details .= "$name is a final class\n";
  }
  if ( $class->isInstantiable() ) {
    $details .= "$name can be instantiated\n";
  } else {
    $details .= "$name can not be instantiated\n";
  }
  if ( $class->isCloneable() ) {
    $details .= "$name can be cloned\n";
  } else {
    $details .= "$name can not be cloned\n";
  }

  return $details;
}