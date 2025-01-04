<?php

class CollectionA {
    public array $strings = ['value1', 'value2', 'value3'];
    public function publicMethodA() {}
    protected function protectedMethodA() {}
    private function privateMethodA() {}
}

class CollectionProxy {
    public CollectionA $original;
    public function testProxy(): CollectionA {}
}

class CollectionResolver {
    public CollectionProxy $proxy;

    public function testResolver() {}
}


$resolver = new CollectionResolver();
$resolver->resolveMethod('');
$resolver->resolveProperty('');
