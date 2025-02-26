<?php

namespace Callable {
    class Invokable {
        public function __invoke(string $name, string $value=''){}
        public function method1(string $name){}
        public function method2(string $name){}
        public function method3(string $name){}
    }


    $obj = new Invokable();
    $obj('method3');
    $obj(name: 'method3');
    $obj(name: 'invokable', value: 'test');
    $obj(value: 'test', name: 'method3');
}
