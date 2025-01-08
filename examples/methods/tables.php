<?php

class MethodFinder {
    public function methodFinderMethod() {}
}

MethodFinder::getTables('sqlite_master');

class ActiveRecord {
    public static function tableName()
    {
        return '';
    }


    public function method1()
    {
        return '';
    }
}

