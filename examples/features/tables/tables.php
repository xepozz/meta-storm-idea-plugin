<?php

namespace Database {
    class Catalog
    {
        public static function find(string $value, string $filter){}
    }

    Catalog::find('sqlite_master', '');
    Catalog::find(filter: 'n', value: 'sqlite_master');

    class ActiveRecord
    {
        public static function tableName()
        {
            return 'sqlite_master';
        }

        public static function columns()
        {
            return 'type';
        }
    }
}