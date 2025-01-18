<?php

namespace Database {
    class Catalog
    {
        public static function find(string $value){}
    }

    Catalog::find('sqlite_master');
    Catalog::find('sqlite_master');

    class ActiveRecord
    {
        public static function tableName()
        {
            return 'sqlite_master';
        }
    }
}