<?php

$a = new User;
$as = [$a, $a];

$b = [
    'key' => 'value',
    'age' => 5555,
    'array' => ['value'],
    "double qoutes" => ['value'],
    2 => User::class,
    User::class => fn() => 123,
];

ArrayHelper::getPropertyValue($a, 'age');
ArrayHelper::getPropertyValue($a, 'age');
ArrayHelper::getPropertyValue($b, 'key');
