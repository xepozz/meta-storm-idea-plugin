<?php

class User { private $id; protected $name; public $age; }

$user = new User;

class ArrayHelper {public static function getPropertyValue(mixed $object, string $name) {} }

ArrayHelper::getPropertyValue($user, 'id'); //  // reference is the variable $a
ArrayHelper::getPropertyValue($user, 'id'); //  // reference is the variable $a

$user->label('age'); // reference is the variable $a
$user->wtf('age'); // reference is the variable $a, but method is not configured


class Author extends User{}

$author = new Author();
ArrayHelper::getPropertyValue($author, 'id'); //  // reference is the variable $a
