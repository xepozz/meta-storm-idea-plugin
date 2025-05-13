<?php

namespace Modx;

class Modx
{
    function getObject(string $value) {}
    function newObject(string $value) {}
    function newQuery(string $value) {}
}

$modx = new Modx(); 
$modx->getObject('');
$modx->newObject('modAccessCategory');
$modx->newQuery('MyFavoriteUsers');