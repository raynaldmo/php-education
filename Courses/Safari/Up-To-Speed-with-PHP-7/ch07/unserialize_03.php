<?php
class Trusted
{
    public $motto = 'Safety first';

}

$serialized = serialize(new Trusted());

$extract = unserialize($serialized, ['allowed_classes' =>
    ['Trusted', 'AlsoSafe']]);
var_dump($extract);