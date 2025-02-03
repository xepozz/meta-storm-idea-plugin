<?php

namespace ArrayKey {
    class Invokable {
        public $var1;
        public function __invoke(array $name){}
    }


    $obj = new Invokable([
        'var1' => ''
    ]);
    $obj('array-value1');
    $obj(['array-value1']);
    $obj(['array-key1' => 'array-value1']);
}
