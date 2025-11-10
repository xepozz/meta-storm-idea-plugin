<?php

namespace ClassMethod {
    trait HasProperty {
        public function has(string $name){}
    }
    class Target {
        use HasProperty;

        public $title;
        public $name;
        public function method(string $name){}
    }


    $obj = new Target();
//    $obj->method('title');
    $obj->has('title');
}
