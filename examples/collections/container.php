<?php

namespace App {

    use Framework\Container;
    use Framework\Tag;

    $c = new Container;
    $command = $c->getCommand('');
    $tag = $c->getTag('');


    #[Tag('')]
    class AttributeTester
    {

    }
}