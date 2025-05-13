<?php

namespace Constants {

    class Dictionary
    {
        const CONST1 = ';';
        public const CONST2 = ';';

        protected const CONST3 = ';';
        protected const CONSTANT = ';';

        private const CONST4 = ';';
        private const CONST5 = ';';

        public $_prop2 = null;
        public $prop = null;

        static function lookup(string $value) {}
    }

    Dictionary::lookup('CONST5');
}
