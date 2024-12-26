<?php

namespace Tests;

use Framework\Client;
use Framework\ClassMarker;
use Framework\AttributeValueMarker;

#[ClassMarker]
class CycleFoo
{
    #[AttributeValueMarker('test-cycle-bar')]
    public function cycleBar()
    {
        echo "test";
    }
}


$client = new Client();
$client->attributeArgumentValue('test-bar');