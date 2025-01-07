<?php

class MyService {
    public function publicMethod() {}
    protected function protectedMethod() {}
    private function privateMethod() {}
}

$user = new MyService;

class MethodFinder {public static function find(object $object, string $name) {} }

MethodFinder::find($user, 'protectedMethod');

class Controller {
    public function action()
    {
        MethodFinder::findInCurrentClass('');
    }

    public function method1() {}
}