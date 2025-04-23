<?php

namespace Examples\Filter;

class ParentClass {}
class Child1 extends ParentClass {}
class Child2 extends ParentClass {}

class Helper
{
    public static function help(string $class) {}
}

Helper::help('');