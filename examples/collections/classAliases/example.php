<?php

namespace ClassAliases;

class Aliases
{ 
    function resolve(string $value) {}
}

$aliases = new Aliases();
$aliases->resolve('aliases2');