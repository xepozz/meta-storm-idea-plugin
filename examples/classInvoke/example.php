<?php

namespace Callable {
    class Invokable {
        public function __invoke(string $name){}
        public function method1(string $name){}
        public function method2(string $name){}
        public function method3(string $name){}
    }


    $obj = new Invokable();
    $obj('method3');
}
