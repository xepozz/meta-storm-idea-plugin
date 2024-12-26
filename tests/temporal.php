<?php

namespace Tests;

use Framework\Client;
use Framework\ClassMarker;
use Framework\AttributeValueMarker;

#[ClassMarker]
class TestFoo
{
    #[AttributeValueMarker('test-bar')]
    public function testBar()
    {
        echo "test";
    }
}


$client = new Client();
$client->attributeArgumentValue('test-bar');