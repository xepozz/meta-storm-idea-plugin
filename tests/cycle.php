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


$workflowClient = new Client();
$workflowClient->attributeArgumentValue('test-bar');