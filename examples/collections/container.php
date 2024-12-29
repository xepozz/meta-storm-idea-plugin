<?php

namespace App {

    use Framework\Container;

    $c = new Container;
    $command = $c->getCommand('app');
    $tag = $c->getTag('tag_logger');

}