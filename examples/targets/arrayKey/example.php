<?php

namespace ArrayKey {
    class Invokable {
        public function __invoke(array $name){}
    }


    $obj = new Invokable();
    $obj('');
    $obj(['s' => 's']);
}
