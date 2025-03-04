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
            return 'table_name1';
        }

        public static function columns()
        {
            return 'i';
        }
    }
}