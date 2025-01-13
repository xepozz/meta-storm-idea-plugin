<?php

class ResultStub {public function result() {return null; }}
class IntResult extends ResultStub{public function int() {return null; }}
class StringResult extends ResultStub{public function string() {return null; }}
class NullResult extends ResultStub{public function null() {return null; }}
class ObjectResult extends ResultStub{public function object() {return null; }}

class LangFactory {
    public function create(string $type): ResultStub {return null; }
}

$factory = new LangFactory();

$int = $factory->create('int');
$string = $factory->create('string');
$null = $factory->create('null');
$object = $factory->create('object');

$object->object();
$null->null();
