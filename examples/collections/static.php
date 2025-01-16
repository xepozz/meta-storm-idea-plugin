<?php

use Framework\Tag;

$collector = new StaticCollector();

$collector->suggest('Hello');

#[Tag('tag_logger')]
class AttributeTester
{

}