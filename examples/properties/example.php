<?php

class User { private $id; protected $name; public $age; }

$a = new User;

class ArrayHelper {public static function getPropertyValue(object $object, string $name) {} }

ArrayHelper::getPropertyValue($a, 'age'); //  // reference is the variable $a
ArrayHelper::getPropertyValue($a, ''); //  // reference is the variable $a

$a->label('age'); // reference is the variable $a
$a->wtf('age'); // reference is the variable $a, but method is not configured