<?php

namespace Examples\Processor;

class Controller {}
class UserController extends Controller {}
class CarController extends Controller {}

class Helper
{
    public static function toController(string $class) {}
    public static function toController2(string $class) {}
}

Helper::toController('Car');
Helper::toController2('User');