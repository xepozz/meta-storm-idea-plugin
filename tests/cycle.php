<?php

namespace Tests;

use Framework\Client;
use Framework\ClassMarker;
use Framework\AttributeValueMarker;

#[ClassMarker]
class CycleFoo
{
    #[AttributeValueMarker('test-cycle-bar')]
    #[AttributeValueMarker('tag_logger')]
    public function cycleBar()
    {
        echo "test";
    }
}


new AttributeValueMarker('tag_logger');
$client = new Client('tag_logger');
$client->attributeArgumentValue('');
$client->attributeClass(\App\MyRenderer::class);